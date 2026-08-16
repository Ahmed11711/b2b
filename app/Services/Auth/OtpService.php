<?php

namespace App\Services\Auth;

use \App\Models\User;
use App\Mail\OtpMail;
use function Symfony\Component\Clock\now;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class OtpService
{
    // أنواع العمليات (Contexts)
    public const CONTEXT_REGISTER = 'register';
    public const CONTEXT_FORGET_PASSWORD = 'forget_password';

    private const THROTTLE_SECONDS = 60;

    /**
     * Dispatch OTP based on specific context.
     */


    public function sendOtp(string $identifier, string $context): array
    {
        $identifier = strtolower(trim($identifier));
        $cacheKey = "otp_{$context}_{$identifier}";
        $throttleKey = "otp_throttle_{$context}_{$identifier}";

        if (Cache::has($throttleKey)) {
            throw ValidationException::withMessages([
                'otp' => ['Please wait before requesting a new code for this action.'],
            ]);
        }

        $otp = (string) random_int(100000, 999999);
        $expiry = ($context === self::CONTEXT_REGISTER) ? 60 : 5;

        // استخدام Carbon::now() يحل مشكلة التعريفات في المحرر
        Cache::put($cacheKey, $otp, Carbon::now()->addMinutes($expiry));
        Cache::put($throttleKey, true, Carbon::now()->addSeconds(self::THROTTLE_SECONDS));

        $this->dispatchMessage($identifier, $otp, $context);

        return [
            'success' => true,
            'message' => "Verification code for {$context} sent successfully.",
            'expires_at' => $expiry,
            'otp' => $otp,
        ];
    }

    /**
     * Verify OTP for a specific context.
     */
    public function verifyOtp(string $identifier, string $otp, string $context): bool
    {
        $identifier = strtolower(trim($identifier));
        $cacheKey = "otp_{$context}_{$identifier}";

        $cachedOtp = Cache::get($cacheKey);

        if (!$cachedOtp || (string)$cachedOtp !== (string)$otp) {
            throw ValidationException::withMessages([
                'otp' => ['Invalid or expired verification code.'],
            ]);
        }
        $user = User::where('email', $identifier)
            ->orWhere('phone', $identifier)
            ->first();

        if ($user && $context === self::CONTEXT_REGISTER) {
            $user->email_verified_at = now();
            $user->save();
        }
        Cache::forget($cacheKey);
        Cache::forget("otp_throttle_{$context}_{$identifier}");

        return true;
    }

    /**
     * الرسائل تختلف بناءً على النوع (Personalization)
     */
    private function dispatchMessage(string $identifier, string $otp, string $context): void
    {
        $expiry = ($context === self::CONTEXT_REGISTER) ? 60 : 5;

        Log::info("SENDING {$context} OTP to {$identifier}");

        try {
            Mail::to($identifier)->send(new OtpMail($otp, $context, $expiry));
        } catch (\Throwable $e) {
            Log::error("Failed to send OTP email to {$identifier}: " . $e->getMessage());
            throw $e;
        }
    }
}
