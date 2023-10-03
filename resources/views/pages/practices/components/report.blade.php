<div class="card">
    <div class="card-body">
        @role('student')
        @if($practice->report_status === 'processing')
            <button class="btn btn-app bg-warning" disabled>
                <i class="fas fa-spinner custom-spinner"></i> Отчет формируется обновите страницу, через пару минут
            </button>
        @else
            <a href="{{ route('generate-report', $practice->id) }}" class="btn btn-app bg-primary">
                <i class="fas fa-file-pdf"></i> Сформировать отчет
            </a>
        @endif
        @endrole
        @isset($practice->pdf_link)
            <a href="/{{ $practice->pdf_link }}" class="btn btn-app bg-success">
                <i class="fas fa-file-download"></i> Скачать отчет
            </a>
        @endisset
    </div>
</div>

@push('custom-styles')
    <style>
        .custom-spinner {
            transform: rotateX(0deg);
            animation: custom-spinner 0.9s linear infinite;
        }

        @keyframes custom-spinner {
            0% {
                transform: rotateX(0deg);
            }
            100% {
                transform: rotate(359deg);
            }
        }
    </style>
@endpush
