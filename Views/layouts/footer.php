<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script>
    window.addEventListener("load", function(event) {
        const myModalEl = document.getElementById('editModal')
        myModalEl.addEventListener('show.bs.modal', event => {
            event.target.querySelector('textarea').value = event.relatedTarget.dataset.text;
            event.target.querySelector('input').value = event.relatedTarget.dataset.id;
        })
    });
</script>


</body>
</html>