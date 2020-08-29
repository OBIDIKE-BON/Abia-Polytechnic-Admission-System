<?php  require_once 'includes/session.php';
if (isset($_SESSION['pin'])) {
    require_once 'includes/header.php';
    ?>        
        
        <div class="container">
            <div class="row container">
                <div class="col-md-12">
                    <h1 class="text-center text-primary">Contact Us</h1>
                </div>
            </div>
            <div class="row container">
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading"> 
                                <h2 class="panel-title text-center"> 
                                    <span class="glyphicon glyphicon-picture">&nbsp;</span>Contacts</h2> 
                            </div>                         
                            <div class="panel-body text-primary"> 
                                <p>
                                    <h4>The Rector</h4>
                                    <b>Name:</b> Prof. Ezionye Eboh PhD, FCAI<br/>
                                    <b>Email:</b> rector@abiapoly.edu.ng<br/>
                                    (mailto:rector@abiapoly.edu.ng)<br/><br/>
                                    <h4>The Registrar</h4>
                                    <b>Name:</b> Chief Mrs Comfort Nwabughiogu<br/>
                                    <b>Email:</b> registrar@abiapoly.edu.ng<br/>
                                    (mailto:registrar@abiapoly.edu.ng)<br/><br/>
                                    <h4>PRO</h4>
                                    <b>Name:</b> Mr. Martin Ndulaka<br/>
                                    <b>Tel:</b> +2347030072425,+2348078585178<br/>
                                    <b>Email:</b> publicrelations@abiapoly.edu.ng,<br/>
                                    ndulaka3@yahoo.com<br/>
                                
                                </p> 
                            </div> 
                    </div>
                </div>
                <div class="col-md-1">
                </div>
                <div class="well col-md-7">
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-10">
                        <form role="form" action="<?php $_PHP_SELF?>" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" name="name" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="middlename">Email:</label>
                                    <input type="email" class="form-control" name="email" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="othername">Comment:</label>
                                    <textarea class="form-control" name="comment" cols="11" rows="6" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row text-center">
                    <div class="col-md-12">
                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-primary btn-md form-control" name="submit">Submit</button>
                        </div>
                        <div class="form-group col-md-6">
                            <button type="reset" class="btn btn-danger btn-md form-control">Reset</button>
                        </div>
                    </div>
                </div>
                    </form>
                    </div>
                    <div class="col-md-1">
                    </div>
                </div>
            </div>
        </div>
    <?php
    require_once 'includes/footer.php';
} else {
        echo '<script>window.alert( "You must login with your scratch card to view this page !");
         window.location.href="login.php";</script>';
}
?>  