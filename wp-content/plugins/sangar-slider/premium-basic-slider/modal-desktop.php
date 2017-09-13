<div class='sangar-layer sangar-layer-admin-container'>
	<div class="canvas-percent"></div>
	<div class='canvas-container canvas-desktop' data-type='desktop'></div>

	<div class='sangar-layer-button'>
		<a href="javascript:;" class='button button-primary button-large' id='sslider-layer-add'>Add Layer</a>				
		<a href="javascript:;" class='button button-large' id='sslider-refresh-grid'>Refresh Grid</a>
		<a href="javascript:;" class='button button-large' id='sslider-play-animation'>Animate!</a>
		<a href="javascript:;" class='button button-large no-border toggle-off' id='sslider-toggle-snap'>Grid</a>
		<a href="javascript:;" class='button button-large no-border sslider-toggle-toolbox toggle-off'>Toolbox</a>
		<!-- <a href="javascript:;" class='button button-large' id="show-data-layer-json">Show Data</a> -->
	</div>

	<textarea style="display:none;" name="slide-layer"></textarea>
	
	<div class='template'>
		<div class='layer-template'>
			<div class='layer new-layer' id='sangar-layer-{{type}}-{{id}}' data-id='{{id}}' data-type='{{type}}'>
				<div class="layer-container">
					<div class='layer-control layer-sort' >{{number}}</div>	
					<div class='layer-control layer-control-button layer-edit' ></div>						
					<div class='layer-control layer-control-button layer-duplicate' ></div>	
					<div class='layer-control layer-control-button layer-decrease-z' ></div>	
					<div class='layer-control layer-control-button layer-add-z' ></div>	
					<div class='layer-control layer-control-button layer-delete' ></div>
					<div class='layer-control-border' ></div>

					<div class="layer-content">						
						<div class="content-add add-text">&nbsp;</div>
						<div class="content-add add-html">&nbsp;</div>
						<div class="content-add add-image">&nbsp;</div>
						<div class="content-add add-youtube">&nbsp;</div>
						<div class="content-add add-button">
							<p>BUTTON</p>
						</div>
					</div>

				</div>
			</div>
		</div>

	</div>
</div>