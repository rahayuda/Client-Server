<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
        $(document).ready(function() {
            function loadAllMahasiswa() {
                $.ajax({
                    url: 'search.php',
                    type: 'GET',
                    data: { search: '' },
                    success: function(data) {
                        var mahasiswa = JSON.parse(data);
                        var output = '';
                        for (var i in mahasiswa) {
                            output += '<tr>' +                     
                            '<td>' + mahasiswa[i].nim + '</td>' +
                            '<td>' + mahasiswa[i].nama + '</td>' +
                            '</tr>';
                        }
                        $('#mahasiswaTable').html(output);
                    }
                });
            }

            loadAllMahasiswa();

            $('#search').keyup(function() {
                var searchValue = $(this).val();
                $.ajax({
                    url: 'search.php',
                    type: 'GET',
                    data: { search: searchValue },
                    success: function(data) {
                        var mahasiswa = JSON.parse(data);
                        var output = '';
                        for (var i in mahasiswa) {
                            output += '<tr>' +                     
                            '<td>' + mahasiswa[i].nim + '</td>' +
                            '<td>' + mahasiswa[i].nama + '</td>' +
                            '</tr>';
                        }
                        $('#mahasiswaTable').html(output);
                    }
                });
            });
        });
    </script>

<input type="text" id="search" placeholder="Search..."><hr>
<table>
    <tbody id="mahasiswaTable">
        <!-- Data mahasiswa akan dimuat di sini -->
    </tbody>
</table>