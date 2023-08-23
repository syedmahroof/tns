
<div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            @livewire('details')
        </div>
    </div>
</div>

<script>
    window.addEventListener('show-details-modal', event => {
        $('#detailsModal').modal('show');
    });
</script>