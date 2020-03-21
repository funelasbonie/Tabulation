</div>
</div>

</body>
</html>

<script src="js/jquery-1.11.3-jquery.min.js"></script> 
<script src="printThis.js"></script> 
<script>  

      $('#print').click(function(){
      $('.pcontent').printThis({      
            debug: false,               // show the iframe for debugging
	        importCSS: true,            // import parent page css
	        importStyle: false,         // import style tags
	        printContainer: true,       // print outer container/$.selector
	        loadCSS: "",                // path to additional css file - use an array [] for multiple
	        pageTitle: "",              // add title to print page
	        removeInline: false,        // remove inline styles from print elements
	        removeInlineSelector: "*",  // custom selectors to filter inline styles. removeInline must be true
	        printDelay: 333,            // variable print delay
	        header: "<style>table{border-collapse: collapse;width :100%; font-size: 15px;} table, th, td{border:1px solid black} img{display:none}</style><center><h3>AUTabS</h3></center>",               // prefix to html
	        footer: null,               // postfix to html
	        base: false,                // preserve the BASE tag or accept a string for the URL
	        formValues: true,           // preserve input/form values
	        canvas: false,              // copy canvas content
	        doctypeString: '<!DOCTYPE html>', // enter a different doctype for older markup
	        removeScripts: false,       // remove script tags from print content
	        copyTagClasses: false,      // copy classes from the html & body tag
	        beforePrintEvent: null,     // callback function for printEvent in iframe
	        beforePrint: null,          // function called before iframe is filled
	        afterPrint: null            // function called before iframe is removed               
      });
    })  

    /*$('#loading').on('click', function(){
    	$(this).button('loading').delay();
    })*/
 
</script>
<script>window.jQuery || document.write('<script src="css/bootstrap-3.3.7/docs/assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="css/bootstrap-3.3.7/docs/dist/js/bootstrap.min.js"></script>

<script>
    function showmodal(){
        document.getElementById("id01").style.display="block";
    }
	function showmodal2(){
        document.getElementById("id02").style.display="block";
    }
    function showmodal3(){
        document.getElementById("id03").style.display="block";
    }
    function showmodal4(){
        document.getElementById("id04").style.display="block";
    }
    function showmodal5(){
        document.getElementById("id05").style.display="block";
    }

    function hidemodal(){
        document.getElementById("id01").style.display="none";
		document.getElementById("id02").style.display="none";
        document.getElementById("id03").style.display="none";
        document.getElementById("id04").style.display="none";
        document.getElementById("id05").style.display="none";
    }  

    var modal = document.getElementById('id01');
	var modal2 = document.getElementById('id02');
    var modal3 = document.getElementById('id03');
    var modal4 = document.getElementById('id04');
    var modal5 = document.getElementById('id05');

    window.onclick = function(event) {
        if(event.target == modal || event.target == modal2 || event.target == modal3 || event.target == modal4 || event.target == modal5) {
            modal.style.display = "none";
			modal2.style.display = "none";
            modal3.style.display = "none";
            modal4.style.display = "none";
            modal5.style.display = "none";

        } 
     }	

	 function showRow1(row)
      {
        var x = row.cells;        
        document.getElementById('id').value = x[0].innerHTML;
        document.getElementById('user').value = x[1].innerHTML;
        document.getElementById('pass').value = x[2].innerHTML;

      }
      
	 function showRow2(row)
      {
        var x = row.cells;        
        document.getElementById('candid').value = x[1].innerHTML;
        document.getElementById('name').value = x[2].innerHTML;
        document.getElementById('image').value = x[0].innerHTML;
        document.getElementById('gender').attributes.text = x[3].innerHTML;

      }
</script>
