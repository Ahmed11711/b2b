<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
</head>

<body style="font-family: Arial, sans-serif; direction: rtl; text-align: right;">
    <div style="max-width: 500px; margin: auto; padding: 20px;">
        <h2>
            @if ($context === 'register')
                مرحبًا بك! 👋
            @else
                طلب إعادة تعيين كلمة المرور
            @endif
        </h2>

        <p>رمز التحقق الخاص بك هو:</p>

        <div
            style="font-size: 28px; font-weight: bold; letter-spacing: 4px; background: #f4f4f4; padding: 15px; text-align: center; border-radius: 8px;">
            {{ $otp }}
        </div>

        <p style="margin-top: 15px;">هذا الرمز صالح لمدة {{ $expiryMinutes }} دقيقة.</p>

        <p style="color: #888; font-size: 12px; margin-top: 20px;">
            إذا لم تطلب هذا الرمز، تجاهل هذه الرسالة.
        </p>
    </div>
</body>

</html>
