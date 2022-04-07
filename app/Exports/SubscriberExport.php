<?php

namespace App\Exports;

use App\Models\Subscriber;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SubscriberExport implements FromCollection, WithHeadings {
    public function collection() {
        return Subscriber::all('email', 'created_at');
    }

    public function headings(): array {
        return ['Email', 'Created At'];
    }
}