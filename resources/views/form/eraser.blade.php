<div class="row">
	<div class="col center-block">
		<div class="form-group">
        	{{ Form::text('name' , null , ['class' => 'form-control']) }}
            {{ Form::label('name' , 'Introduzca el nombre' , ['class' => 'form-control-label']) }}
        </div>
        <div class="form-group">
        	{{ Form::text('website' , null , ['class' => 'form-control']) }}
			{{ Form::label('website' , 'Introduzca el Website' , ['class' => 'form-control-label']) }}
    	</div>
    	<div class="form-group">
        	{{ Form::text('mail' , null , ['class' => 'form-control']) }}
			{{ Form::label('mail' , 'Introduzca el correo' , ['class' => 'form-control-label']) }}
    	</div>
    	<div class="form-group">
        	{{ Form::text('summary' , null , ['class' => 'form-control']) }}
			{{ Form::label('summary' , 'Introduzca el sumario' , ['class' => 'form-control-label']) }}
    	</div>

    	<div class="form-group">
    		<button type="submit" class="btn btn-success btn-lg btn-block">ENVIAR</button>
    	</div>
	</div>
</div>
