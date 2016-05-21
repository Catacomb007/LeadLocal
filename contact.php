

 <?php include("../public/header.php");?>
    <div >
        <img class="bgIMG" src="../public/img/indexContainerBG8.png" width="100%">
    </div>  
    <div class="container">
        <row>
             
            <br/>
            <br/>
        <span class="col-sm-4 col-md-4 col-lg-4"></span>  
        <div class="input-group col-xs-12 col-sm-4 col-md-4 col-lg-4">     
        <form name="htmlform" method="post" action="contactForm.php">
<table width="450px">
</tr>
<tr>
 <td valign="top">
  <label for="first_name">First Name *</label>
 </td>
 <td valign="top">
  <input  type="text" name="first_name" maxlength="50" size="30">
 </td>
</tr>
 
<tr>
 <td valign="top">
  <label for="last_name">Last Name *</label>
    </td>
 <td valign="top">
  <input  type="text" name="last_name" maxlength="50" size="30">
 </td>
</tr>
<tr>
 <td valign="top">
  <label for="email">Email Address *</label>
 </td>
 <td valign="top">
  <input  type="text" name="email" maxlength="80" size="30">
 </td>
 
</tr>
<tr>
 <td valign="top">
  <label for="telephone">Telephone Number</label>
 </td>
 <td valign="top">
  <input  type="text" name="telephone" maxlength="30" size="30">
 </td>
</tr>
<tr>
 <td valign="top">
  <label for="comments">Comments *</label>
 </td>
 <td valign="top">
  <textarea  name="comments" maxlength="1000" cols="25" rows="6"></textarea>
 </td>
 
</tr>
<tr>
 <td colspan="2" style="text-align:center">
     <button class="btn waves-effect btn-primary" id="submit" value="Submit" type="submit" >Submit
             </button>
      <p>(
      <a href="http://www.freecontactform.com/html_form.php">HTML Form</a> )</p>
 </td>
</tr>
</table>
</form>
            </div>
        <span class="col-sm-4 col-md-4 col-lg-4"></span>   
        </row>

    </div>
<?php include("../public/footer.php");?>
     