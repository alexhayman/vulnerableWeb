    <footer  class="p-4 text-white text-center">
        <div class="container">
            <p class="lead">Hackeright &copy; Hack Me!  <br> All the information provided on this site are for educational purposes only. The site is no way responsible for any misuse of the information.</p>
        </div>
    </footer>
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
            })
        })()
    </script>
    <script src="bootstrap/jquery.js"></script>
    <script src="bootstrap/bootstrap.js"></script>
    <script src="bootstrap/bootstrap.tab.js"></script>
</main>
</body>
</html> 
