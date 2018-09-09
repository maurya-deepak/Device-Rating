<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="style.css">
    <title>CompareAnything | Welcome </title>
</head>
<body>    
    <div class="modal" id="modal">
            <div class="modal_content" id="modal_content">
                <input type="button" value="X" id="cut">
                <h1>Please Rate</h1>
                <form class="rate">
                    <div id="rating5" class="ratingbox"></div>
                    <textarea type="text" placeholder="comment" required=""></textarea>
                    <input type="submit" value="comment">
                </form>
                </div> 
    </div> 

    <div class="container-compare">
        <div class="searchbar">
                    <input type="text" class="search" placeholder="serch the device...">
                    <input type ="submit" value="search" class="s_btn">
        </div>
        <div class="all_data">
            <div class="data" id="box">
                        <div class="btn" >
                                <input type="button" id="rate" value="Rate & comment">
                        </div> 
                        <input type="submit" id="show_comment" value="Show All Comment">            
           </div>
            <div class="data" >
                        <div class="btn">
                                <input type="button" id="rate1" value="Rate & comment">
                        </div>
                        <input type="submit" id="show_comment" value="Show All Comment">   
            </div>
            <div class="data">
                        <div class="btn">
                                <input type="button" id="rate2" value="Rate & comment">
                        </div>
                        <input type="submit" id="show_comment" value="Show All Comment">   
            </div>
            <div class="data">
                        <div class="btn">
                                <input type="button" id="rate3"  value="Rate & comment">
                        </div>
                        <input type="submit" id="show_comment" value="Show All Comment">   
                    </div>
            
            <div class="next_btn">
                <input type="button" id="next">
            </div>
        </div>
</div>

    <div class="about" id="about">
            <h3>About Us</h3>
            <p>I think that humans have a huge capacity to carry pain and sadness. <br>
            There are things that haunt us our entire lives; we are unable to let them go.
           The good times seem almost effervescent and dreamlike in comparison with the times that didn't go so well.
            </p>
    </div>

    <footer class="footer">
       <h4>Connect with us on</h4>
       <a href="www.whatsapp.com" target="_blank" title="Whatsapp"><img src="images/what.jpg"></a>
       <a href="www.facebook.com" title="Facebook"><img src="images/face.jpg"></a>
       <a href="www.instagram.com" title="Instagram"><img src="images/insta.jpg"></a>
       <a href="www.google.com" title="Google"><img src="images/google.jpg"></a>
       
    </footer>

    <script type="text/javascript">
       var modal = document.getElementById('modal');
       modal.style.visibility = 'hidden';
       document.getElementById('modal_content').style.visibility = "hidden";
      // document.getElementById('rate').onclick = open_modal;
       var rate_array = document.querySelectorAll('[type=button]');
       rate_array[0].onclick = open_modal;
       rate_array[1].onclick = open_modal;
       rate_array[2].onclick = open_modal;
       rate_array[3].onclick = open_modal;
       rate_array[4].onclick = open_modal;
  /*
       var commt_array = document.querySelectorAll('[type=submit]');
       commt_array[0].onclick = open_all_comment;
       commt_array[1].onclick = open_all_comment;
       commt_array[2].onclick = open_all_comment;
       commt_array[3].onclick = open_all_comment;
       commt_array[4].onclick = open_all_comment;

   */    function open_modal(e)
       {    
            e.preventDefault();
            var modal1 = document.getElementById('modal');
            modal1.style.visibility = "visible";
            document.getElementById('modal_content').style.visibility = "visible";
            modal1.style.animation = "popup 350ms ease-in-out forwards";
            document.getElementById('modal_content').style.animation = "popup 350ms ease-in-out forwards";
       }

       document.getElementById('cut').onclick = close_modal ;

       function close_modal(e)
       {    e.preventDefault();
            var data = document.getElementById('modal');
            data.style.visibility = "hidden";
            document.getElementById('modal_content').style.visibility = "hidden";
            data.style.animation = "popin 350ms ease-in-out 1 forwards";
            document.getElementById('modal_content').style.animation = "popin 350ms ease-in-out 1 forwards";
        }

       
    </script>
</body>
</html>
