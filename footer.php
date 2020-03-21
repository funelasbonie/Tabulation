
<footer class="footer">
    <div class="container">            
        <div class="footer-copyright" style="padding: 15px 0px;border-top: 1px solid lightgray">
            Copyright 2020
            <a href="" style="float: right">AUTabS</a>
        </div>        
    </div>
</footer>
</body>
</html>

<script src="js/jquery-1.11.3-jquery.min.js"></script> 
<script>window.jQuery || document.write('<script src="css/bootstrap-3.3.7/docs/assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="css/bootstrap-3.3.7/docs/dist/js/bootstrap.min.js"></script>

<script>

    document.getElementById("id01").style.display="block";
    
    function hidemodal(){
        document.getElementById("id01").style.display="none";		
    }  
    var modal = document.getElementById('id01');
    window.onclick = function(event) {
        if(event.target == modal) {
            modal.style.display = "none";		
        } 
     }	
</script>