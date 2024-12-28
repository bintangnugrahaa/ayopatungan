<?php

namespace App\Filament\Resources\ProductSubscriptionResource\Widgets;

use App\Models\ProductSubscription;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ProductSubscriptionStats extends BaseWidget
{
    protected function getStats(): array
    {
        $totalTransactions = ProductSubscription::count();
        $approvedTransactions = ProductSubscription::where('is_paid', true)->count();
        $totalRevenue = ProductSubscription::where('is_paid', true)->sum('total_amount');

        return [
            Stat::make('Total Transactions', $totalTransactions)
                ->description('All transactions')
                ->descriptionIcon('heroicon-o-currency-dollar'),

            Stat::make('Approved Transactions', $approvedTransactions)
                ->description('Approved transactions')
                ->descriptionIcon('heroicon-o-check-circle')
                ->color('success'),

            Stat::make('Total Revenue', 'IDR ' . number_format($totalRevenue))
                ->description('Revenue from approved transactions')
                ->descriptionIcon('heroicon-o-check-circle')
                ->color('success'),
        ];
    }
}
