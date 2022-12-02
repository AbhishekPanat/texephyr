<script src="JS/add_events.js"></script>
    <script src="JS/dashboard.js"></script>

     dataTables Js
    <script src="JS/jquery.min.js"></script>
    <script src="JS/jquery.dataTables.min.js"></script>
    <script src="JS/dataTables.bootstrap4.min.js"></script>
    <script>
        $('#table').DataTable();

        $(document).ready(function() {
            var table = $('#example').DataTable( {
                lengthChange: false,
                buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
            } );
        
            table.buttons().container()
                .appendTo( '#example_wrapper .col-md-6:eq(0)' );
        } );
    </script>
</body>
</html>