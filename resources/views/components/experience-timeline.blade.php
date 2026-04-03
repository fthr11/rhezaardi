@props(['data' => null])
@php
    if (!$data) {
        $jsonPath = resource_path('data/experiences.json');
        if (file_exists($jsonPath)) {
            $json = file_get_contents($jsonPath);
            $data = json_decode($json, true);
        } else {
            $data = [];
        }
    }
    $locale = app()->getLocale();

    $calculateDuration = function ($start, $end) use ($locale) {
        $startDate = \Carbon\Carbon::parse($start);
        $endDate = $end ? \Carbon\Carbon::parse($end) : \Carbon\Carbon::now();

        // Calculate total months inclusive
        $totalMonths = $startDate->diffInMonths($endDate) + 1;

        $years = floor($totalMonths / 12);
        $months = $totalMonths % 12;

        // Localized format for start/end strings
        $startStr = $startDate->translatedFormat('M Y');
        $endStr = $end ? \Carbon\Carbon::parse($end)->translatedFormat('M Y') : __('date.present');

        $durationParts = [];
        if ($years > 0) {
            $durationParts[] = $years . ' ' . ($years > 1 ? __('date.years') : __('date.year'));
        }
        if ($months > 0) {
            $durationParts[] = $months . ' ' . ($months > 1 ? __('date.months') : __('date.month'));
        }

        // If it's less than a month (shouldn't happen with +1), show 1 month
        if (empty($durationParts)) {
            $durationParts[] = '1 ' . __('date.month');
        }

        $durationStr = implode(' ', $durationParts);

        return "{$startStr} — {$endStr} · {$durationStr}";
    };
@endphp

<div class="space-y-20">
    @foreach ($data as $company)
        <div class="relative pl-20 group">
            {{-- Vertical Line --}}
            @if (!$loop->last)
                <div class="absolute left-[23px] top-12 bottom-[-80px] w-[2px] bg-neutral-100"></div>
            @endif

            <div
                class="absolute left-0 top-0 w-12 h-12 rounded-xl bg-neutral-50 border border-neutral-100 flex items-center justify-center shrink-0 overflow-hidden z-20">
                @if ($company['logo'])
                    <img src="{{ $company['logo'] }}" alt="{{ $company['company'] }}" class="w-full h-full object-contain">
                @else
                    <span class="text-neutral-400 font-bold text-lg">{{ $company['initial'] }}</span>
                @endif
            </div>

            <div class="pb-2">
                <div class="flex flex-wrap items-baseline gap-3 mb-8">
                    <h3 class="font-bold text-lg text-neutral-900 tracking-tight">{{ $company['company'] }}</h3>
                    @if (isset($company['type']))
                        <span class="text-[13px] text-neutral-400 font-medium">· {{ $company['type'] }}</span>
                    @endif
                </div>

                <div class="space-y-10">
                    @foreach ($company['roles'] as $role)
                        <div class="relative pl-8">
                            {{-- Role Dot --}}
                            <div
                                class="absolute left-[-14px] top-[7px] w-3 h-3 rounded-full bg-neutral-200 border-[3px] border-white z-30">
                            </div>

                            <div class="flex flex-col sm:flex-row justify-between items-start gap-2 sm:gap-4 w-full">
                                <div class="flex-1 min-w-0">
                                    <h4 class="font-semibold text-[15px] text-neutral-800 leading-snug">{{ $role['title'] }}
                                    </h4>
                                </div>
                                <div class="text-[12px] text-neutral-400 font-medium sm:text-right shrink-0 sm:pt-0.5">
                                    {{ $calculateDuration($role['start_date'], $role['end_date']) }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
</div>