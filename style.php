<html>
<head>
    <title></title>

<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Mulish:wght@300&display=swap');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body{
    height: 150vh;
    width: 100%;
    background-image:linear-gradient(to left,rgba(11, 7, 71, 0.6),rgba(241, 197, 184, 0.6)),url('./Images/dogback.jpg');
    background-size:cover;
    background-repeat: no-repeat;
    font-family: 'Mulish', sans-serif;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    width: 100vw;
}
.container{
    background-color: #fff;
    border-radius: 10px;
    box-shadow:0 2.8px 2,2px rgba(0, 0, 0, 0.034), 0 6.7px 5.3px rgba(0,0,0.48),0 12.5px ;
    overflow: hidden;
    width:calc(100vw - 65vw);
    max-width:100% ;
}
.header_h2{
    background: linear-gradient(to left,#950fcf,#e6c927);
    padding: 20px 0;
}
.header_h2 h2{

    color: #fff;
    font-family: 'Montserrat', sans-serif;
    font-size: 24px;
    text-transform: uppercase;
    text-align: center;
}
.form{
    padding: 40px; 
}
.form-control{
    margin-top: 10px;
    position:relative;
}
.form-control label{
    display: inline-block;
    margin-bottom:5px;
}
.form-control input{
    width: 90%;
    margin-left:5px;
    padding:8px;
   
}
.form-control textarea{
    width: 90%;
    margin-left:8px;
}
.form .btn{
    background: linear-gradient(to left,#950fcf,#e6c927);
    border-radius: 6px;
    border: none;
    outline: none;
    color: #fff;
    display: block;
    font-family:'Montserrat', sans-serif; ;
    font-size: 15px;
    padding: 10px 0;
    margin-top: 10px;
    width: 100%;
    font-weight: bold;
    text-transform: uppercase;
    transition: all 1s ease;
}
.form .btn:hover{
    background: linear-gradient(to right,#950fcf,#e6c927);
}



</style>      
    </head>         
 </html>