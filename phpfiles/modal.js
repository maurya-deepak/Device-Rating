var modal = document.getElementById('modal');
modal.style.visibility = 'hidden';
document.getElementById('modal_content').style.visibility = "hidden";

var data = document.getElementById("content").querySelectorAll('[type=button]');
var no_of_child = document.querySelectorAll('.reply_btn').length;

for(i=0;i<no_of_child;i++)
{
    data[i].onclick = open_modal;    
}
function open_modal()
       {    
            var name = this.id;
            console.log(name);

            var uername_name_on_modal = document.getElementById("username");
        
            uername_name_on_modal.value = name;
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
            document.getElementById('device').value="";
            document.getElementById('comment').value="";
        }