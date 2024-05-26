<style>
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(51, 51, 51, 0.8);
    }


    .modal-content {
        background-color: #F9EBC4;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #333333;
        width: 80%;
        max-width: 400px;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        position: relative;
    }


    .close {
        color: #333333;
        position: absolute;
        top: 5px;
        right: 10px;
        font-size: 20px;
        font-weight: bold;
        cursor: pointer;
    }


    .div-btns {
        text-align: center;
    }

    .button {
        background-color: #333333;
        color: #F9EBC4;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin: 5px;
    }

    .button:hover {
        background-color: #555555;
    }
</style>
<!-- HTML del modal -->
<div class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>Are you sure you want to delete it?</p>
        <div class="div-btns">
            <button id="confirmDeleteBtn" class="button">Yes</button>
            <button id="cancelDeleteBtn" class="button">No</button>
        </div>
    </div>
</div>
<script src="{{ asset('js/confirm-delete.js') }}"></script>
