<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-slim.min.js"><\/script>');</script>
    <script src="<?php echo site_url('js/popper.min.js');?>"</script>
    <script src="<?php echo site_url('js/bootstrap.min.js');?>"></script>
    <script src="<?php echo site_url('js/holder.min.js'); ?>"</script>
   <script>
      Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
      });
    </script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js" crossorigin="anonymous"></script>
    <button onclick="topFunction()" id="myBtn" title="Go to top">
    <i class="fas fa-arrow-up"></i>
    </button>
    <script>
   window.onscroll = function() {scrollFunction()};
   function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
         document.getElementById("myBtn").style.display = "block";
      } else {
         document.getElementById("myBtn").style.display = "none";
      } 
   }

   function topFunction() {
      $('html,body').animate({ scrollTop: 0 }, 1000);
   }
</script>
  </body>
</html>
