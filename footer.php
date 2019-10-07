</div>
<!-- /.content-wrapper -->

</div>
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Page level plugin JavaScript-->
<script src="vendor/chart.js/Chart.min.js"></script>
<script src="vendor/datatables/jquery.dataTables.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin.min.js"></script>

<!-- Demo scripts for this page-->
<script src="js/demo/datatables-demo.js"></script>
<script src="js/demo/chart-area-demo.js"></script>
<script>
    function func(a){
        var eId = a.getAttribute('eid');
        var eTitle = a.getAttribute('etitle');
        var ePrice = a.getAttribute('eprice');
        var eAuthor = a.getAttribute('eauthor');
        var eYear = a.getAttribute('eyear');
        console.log(eId);
        

        var id = document.getElementById("id1");
        var title = document.getElementById("title1");
        var price = document.getElementById("price1");
        var author = document.getElementById("author1");
        var year = document.getElementById("year1");
        console.log(id);
        
        id.value = eId;
        title.value = eTitle;
        price.value = ePrice;
        author.value = eAuthor;
        year.value = eYear;
    }
</script>
</body>

</html>