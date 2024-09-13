
        document.getElementById('loginBtn').addEventListener('click', function() {
            var formContainer = document.getElementById('formContainer');
            if (formContainer.classList.contains('hidden')) {
                formContainer.classList.remove('hidden');
            } else {
                formContainer.classList.add('hidden');
            }
        });
