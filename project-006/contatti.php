<?php include('header.php') ?>

<div id="mainContaint">
	<div id="mainContaintWrapper">
    	<div id="boxcontatti">
           <div id="boxcontattiinfo">
                <div id="infoSec">
                    <h1>Ezio Colombo Srl</h1>
                    <h3>Vendita - Assitenza - Carrozzeria</h3>
                    <br/> 
                    <span class="glyphicon glyphicon-home"><p>Via S. Giovanni Battista Della Salle, 15 - 30132 Milano</p></span>
                    <br/>                    
                    <span class="glyphicon glyphicon-phone-alt"><p>Tel. 02 - 2590026</p></span>
                    <br/>                    
                    <span class="glyphicon glyphicon-print"><p>Fax. 02 - 26300265</p></span>
                    <br/>                    
                    <span class="glyphicon glyphicon-globe"><p style="color:#111;">www.enaultcolombo.com</p></span>
                    <br/>                    
                    <span class="glyphicon glyphicon-envelope"><p >email: info@renaultcolombo.com</p></span>
                    <br/>                        
            	</div>       
        	</div>
        	<div id="boxcontattiform">
            	<fieldset>
                	<legend>Scrivici</legend>
                    <form id="fields" method="POST" name="contact" action="process.php">
                    	<div id="formSet" class="form-group">
                        	<label class="col-sm-2 control-label col-xs-2" >Nome* </label>
                            <div class="col-sm-10 col-xs-10">
                            	<input class="form-control" type="text" placeholder="Nome" autofocus name="FirstName"></input>
                            </div>
                            <label class="col-sm-2 col-xs-2 control-label">Cognome* </label>
                            <div class="col-sm-10 col-xs-10">
								<input class="form-control" type="text" placeholder="Cognome" name="LastName"></input>
                            </div>
                        </div>
                        <br/>
                        <div id="formSet" class="form-group">
    						<label class="col-sm-2 control-label col-xs-2" for="Telefono">Telefono* </label>
                            <div class="col-sm-10 col-xs-10">
    							<input class="form-control" type="tel" maxlength="15" placeholder="xxx-xxxxxxx" name="Telephon"></input>
                           	</div>
						</div>
                        <br/>
                        <div id="formSet" class="form-group">                        
                            <label class="col-sm-2 control-label col-xs-2" for="Subject">Oggetto* </label>   
                            <div class="col-sm-10 col-xs-10">                         
                            	<input class="form-control" type="text" maxlength="30" placeholder="Oggetto" name="Subject"></input>
                            </div>                        
                        </div>
                        <br/>
                        <div id="formSet" class="form-group">
    						<label class="col-sm-2 control-label col-xs-2" for="Email">Email* </label>
                            <div class="col-sm-10 col-xs-10">
    							<input class="form-control" type="email" maxlength="30" placeholder="name@domain.com" name="Email"></input>
                            </div>
						</div>
                        <br/>
                        <div id="formSet" class="form-group">
    						<label class="col-sm-2 control-label col-xs-2" for="Message">Messaggio* </label>
                            <div class="col-sm-10 col-xs-10">  
   								<textarea class="form-control" placeholder="Scrivi il tuo messaggio cui" name="Message" rows="5" cols="20"></textarea>                       
							</div>
                        </div>
                        <div id="formSet" class="form-group">
    							<label class="col-sm-2 control-label col-xs-2" for="Email"><img id="captchaImg"  style="width:100%;"  src="captcha.php" /></label>
                            <div class="col-sm-10 col-xs-10">
    							<input name="captcha" class="form-control" placeholder="Inserisci il codice di sinistra" type="text"></input>
                            </div>
						</div>
                        <div class="form-group">
                        	<div class="col-sm-offset-2 col-sm-10 col-xs-10">
                        	<input class="btn btn-success" type="submit" value="Invia" name="submit"></input>
							<input class="btn btn-danger" type="reset" value="Reset" name="clear"></input>							
                       		</div>
                        </div>

                    </form>
                </fieldset>
        	</div>
			<div class="clearfix"></div>
        	<div id="mappa">
            	<iframe width="960" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.it/maps?f=q&amp;source=s_q&amp;hl=it&amp;geocode=&amp;q=RENAULT+-+EZIO+COLOMBO+SRL,+Via+della+Salle,+Milano,+MI&amp;aq=0&amp;oq=ezio+colomb&amp;sll=41.442726,12.392578&amp;sspn=14.92778,33.815918&amp;ie=UTF8&amp;hq=RENAULT+-+EZIO+COLOMBO+SRL,&amp;hnear=Via+della+Salle,+Milano&amp;t=m&amp;ll=45.503053,9.2409&amp;spn=0.006295,0.006295&amp;output=embed"></iframe><br /><small>
            </div>
   		</div>
    </div>
</div>

<?php include('footer.php') ?>