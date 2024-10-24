</div>
<!-- /.content-wrapper -->
<!-- Main Footer -->
<footer class="main-footer">
    <strong>Copyright &copy; 2024 <a href="../index.php">Greenfield International Academy</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0
    </div>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- Bootstrap CDN -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>


<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>


<script src="../Assets/JS/script.js"></script>

<script>
    // SUBJECTS 

jQuery(document).ready(function(){

jQuery('#class').change(function(){
    // alert(jQuery(this).val());
    jQuery.ajax({
        url:'ajax.php',
        type:'POST',
        data:{'class_id':jQuery(this).val()},
        dataType:'json',
        success: function(response){
            
            if(response.length > 1){
                jQuery('#section-container').show();
                // for(let i=0 ; i<response.length ; i++){
                //     const element =response[i+1];
                //     jQuery('#Section').append(element);
                // }
                jQuery('#Section').html(response);
            }
            else{
                jQuery('#section-container').hide();
            }
        }
    })
})

})
</script>
</body>

</html>