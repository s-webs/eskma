<div>
    @if ($generatingReport)
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
        <button class="btn btn-app bg-warning">
            <i class="fas fa-spinner custom-spinner"></i> Отчет формируется (Не обновляйте страницу)
        </button>
    @else
        <a wire:click="generateReport" wire:loading.attr="disabled" class="btn btn-app bg-primary">
            <i class="fas fa-file-pdf"></i> Сформировать отчет
        </a>
    @endif
</div>
