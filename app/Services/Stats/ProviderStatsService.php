<?php

namespace App\Services\Stats;

use App\Models\ContactRequest;
use App\Models\ProviderVisit;
use Illuminate\Support\Facades\DB;

class ProviderStatsService
{
    /**
     * @param string $column اسم العمود اللي هنفلتر بيه: service_id أو project_id
     * @param int $id
     */
    public function getStats(string $column, int $id): array
    {
        $viewsCount = ProviderVisit::where($column, $id)->count();
        $callsCount = ContactRequest::where($column, $id)->count();

        return [
            'views_count'      => $viewsCount,
            'calls_count'      => $callsCount,
            'calls_percentage' => $this->calcPercentage($callsCount, $viewsCount),
            'views_by_city'    => $this->getViewsByCity($column, $id, $viewsCount),
            'calls_by_type'    => $this->getCallsByType($column, $id, $callsCount),
        ];
    }

    /**
     * توزيع المشاهدات حسب المدينة بنسبة مئوية
     */
    protected function getViewsByCity(string $column, int $id, int $totalViews): array
    {
        $rows = ProviderVisit::where($column, $id)
            ->whereNotNull('city')
            ->select('city', DB::raw('count(*) as total'))
            ->groupBy('city')
            ->orderByDesc('total')
            ->get();

        return $rows->map(function ($row) use ($totalViews) {
            return [
                'city'       => $row->city,
                'count'      => (int) $row->total,
                'percentage' => $this->calcPercentage($row->total, $totalViews),
            ];
        })->toArray();
    }

    /**
     * توزيع المكالمات حسب نوع وسيلة التواصل بنسبة مئوية
     */
    protected function getCallsByType(string $column, int $id, int $totalCalls): array
    {
        $rows = ContactRequest::query()
            ->join('user_contacts', 'contact_requests.user_contact_id', '=', 'user_contacts.id')
            ->where('contact_requests.' . $column, $id)
            ->select('user_contacts.type', DB::raw('count(*) as total'))
            ->groupBy('user_contacts.type')
            ->orderByDesc('total')
            ->get();

        return $rows->map(function ($row) use ($totalCalls) {
            return [
                'type'       => $row->type,
                'count'      => (int) $row->total,
                'percentage' => $this->calcPercentage($row->total, $totalCalls),
            ];
        })->toArray();
    }

    protected function calcPercentage(int $part, int $total): float
    {
        if ($total <= 0) {
            return 0.0;
        }

        return round(($part / $total) * 100, 2);
    }
}
