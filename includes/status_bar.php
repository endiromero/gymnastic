<?php

/*
  Created on : 10-Mayo-2014, 22:23:50
  Author     : Mitosu
  Name: Miguel Angel Torres
 */

echo '<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Gymnastic Aplication</a>
                </div>
                <div class="navbar-collapse collapse">
                    <form class="navbar-form navbar-right" role="form" >
                        <div class="form-group">
                            <h4><span class="label label-warning navbar-right">Usuario Online: <?php echo $user ?></span></h4>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="logout" class="btn btn-default navbar-right">Logout</button>
                        </div>         
                    </form>
                </div>
            </div>
        </div>';

