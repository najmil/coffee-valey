<?= $this->extend('template'); ?>

<?= $this->section('content'); ?>

    <form id="documentForm">
        <label for="title">Title</label>
        <input type="text" id="title" name="title"><br>

        <label for="author">Author</label>
        <input type="text" id="author" name="author"><br>

        <label for="document">Upload Document</label>
        <input type="file" id="document" name="document"><br>

        <button type="submit">Submit</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#documentForm').submit(function (event) {
                event.preventDefault();

                var title = $('#title').val();
                var author = $('#author').val();

                var formData = new FormData();
                formData.append('title', title);
                formData.append('author', author);
                
                var document = $('#document')[0];
                formData.append('document', document.files[0]);

                $.ajax({
                    url: '<?= site_url('menu/document_add') ?>', 
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if (response.status === 'success') {
                            alert('Document saved successfully.');
                        } else {
                            alert('Failed to save document: ' + response.message);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('Error:', error);
                        alert('Failed to save document.');
                    }
                });
            });
        });
    </script>

<?= $this->endSection('content'); ?>
