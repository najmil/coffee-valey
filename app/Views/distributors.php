<?= $this->extend('template'); ?>

<?= $this->section('content'); ?>
    <style>
        .modal {
            display: none;
            position: fixed;
        }
    </style>

    <table>
        <thead>
            <tr>
                <th>Distributors Name</th>
                <th>City</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($distributors as $dist) : ?>
                <tr>
                    <td><?= $dist['distributor_name'] ?></td>
                    <td><?= $dist['city'] ?></td>
                    <td>
                        <button class="editDistributor" data-id="<?= $dist['id'] ?>">Edit</button>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <button id="addDistributor">Add Distributor</button>

    <div id="addModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <form id="addDistributorForm">
                <label for="distributor_name">Distributor Name:</label>
                <input type="text" id="distributor_name" name="distributor_name"><br>
                <label for="city">City:</label>
                <input type="text" id="city" name="city"><br>
                <label for="state">state/Region:</label>
                <input type="text" id="state" name="state"><br>
                <label for="country">Country:</label>
                <select id="country" name="country">
                    <option value="Indonesia">Indonesia</option>
                    <option value="Australia">Australia</option>
                    <option value="Singapore">Singapore</option>
                    <option value="Malaysia">Malaysia</option>
                </select><br>
                <label for="phone">Phone:</label>
                <input type="number" id="phone" name="phone" required><br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email"><br>
                
                <input type="submit" value="Add">
            </form>
        </div>
    </div>

    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <form id="editDistributorForm">
                <input type="hidden" id="edit_distributor_id" name="edit_distributor_id">
                <label for="edit_distributor_name">Distributor Name:</label>
                <input type="text" id="edit_distributor_name" name="edit_distributor_name"><br>
                <label for="edit_city">City:</label>
                <input type="text" id="edit_city" name="edit_city"><br>
                <label for="edit_state">state/Region:</label>
                <input type="text" id="edit_state" name="edit_state"><br>
                <label for="edit_country">Country:</label>
                <select id="edit_country" name="edit_country">
                    <option value="Indonesia">Indonesia</option>
                    <option value="Australia">Australia</option>
                    <option value="Singapore">Singapore</option>
                    <option value="Malaysia">Malaysia</option>
                </select><br>
                <label for="edit_phone">Phone:</label>
                <input type="number" id="edit_phone" name="edit_phone" required><br>
                <label for="edit_email">Email:</label>
                <input type="email" id="edit_email" name="edit_email"><br>

                <input type="submit" value="Save">
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#addDistributor').click(function () {
                $('#addModal').show();
            });

            $('.close').click(function () {
                $('#addModal').hide();
                $('#editModal').hide();
            });

            $('.editDistributor').click(function () {
                var distributorId = $(this).data('id');

                $.ajax({
                    url: '<?= site_url('menu/get_distributor_info') ?>',
                    type: 'POST',
                    data: { id: distributorId },
                    dataType: 'json',
                    success: function (response) {
                        $('#edit_distributor_id').val(response.id);
                        $('#edit_distributor_name').val(response.distributor_name);
                        $('#edit_city').val(response.city);
                        $('#edit_state_region').val(response.state);
                        $('#edit_country').val(response.country);
                        $('#edit_phone').val(response.phone);
                        $('#edit_email').val(response.email);
                        
                        $('#editModal').show();
                    }
                });
            });

            $('#editDistributorForm').submit(function (event) {
                event.preventDefault();
                var formData = $(this).serialize();
                
                $.ajax({
                    url: '<?= site_url('menu/distributor_edit') ?>',
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function (response) {
                        if (response.status === 'success') {
                            alert('Distributor updated successfully.');
                            $('#editModal').hide();
                            location.reload();
                        } else {
                            alert('Failed to update distributor: ' + response.message);
                        }
                    }
                });
            });

            $('#addDistributorForm').submit(function (event) {
                event.preventDefault();
                var formData = $(this).serialize();
                
                $.ajax({
                    url: '<?= site_url('menu/distributor_add') ?>',
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function (response) {
                        if (response.status === 'success') {
                            alert('Distributor added successfully.');
                            $('#addModal').hide();
                            location.reload();
                        } else {
                            alert('Failed to add distributor: ' + response.message);
                        }
                    }
                });
            });
        });
    </script>

<?= $this->endSection('content'); ?>
