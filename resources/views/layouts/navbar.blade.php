<!--Navbar-->
<nav class="navbar fixed-top navbar-expand-lg navbar-light cyan lighten-3 scrolling-navbar">

	<!-- Navbar brand -->
	<a class="navbar-brand" href="{{ url('home') }}"><i class="fas fa-graduation-cap mr-2"></i>Software Educativo (Redes)</a>

	<!-- Collapse button -->
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<!-- Collapsible content -->
	<div class="collapse navbar-collapse" id="basicExampleNav">

		<!-- Links -->
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<a class="nav-link" href="{{ url('home') }}"><i class="fas fa-home mr-2"></i>Inicio</a>
			</li>
			@if ( Auth::user()->type == 'student' )
				<li class="nav-item">
					<a class="nav-link" href="{{ url('imagenes') }}"><i class="fas fa-chart-line mr-2"></i>Imágenes</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ url('videos') }}"><i class="fas fa-chart-line mr-2"></i>Vídeos</a>
				</li>
				

				{{-- <li class="nav-item">
					<a class="nav-link" href="{{ url('pruebas') }}"><i class="fas fa-chart-line mr-2"></i>Pruebas</a>
				</li>  --}}

				<li class="nav-item">
					<a class="nav-link" href="{{ url('evaluaciones') }}"><i class="fas fa-chart-line mr-2"></i>Evaluaciones</a>
				</li>
			@else
				<li class="nav-item">
					<a class="nav-link" href="{{ url('estudiantes') }}"><i class="fas fa-bolt mr-2"></i>Estudiantes</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="modal" href="#seccionnueva"><i class="fas fa-plus mr-2"></i>Añadir seccion</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="modal" href="#temanuevo"><i class="fas fa-plus mr-2"></i>Añadir tema</a>
				</li>
				
				<!-- Dropdown -->
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-plus"></i> Añadir contenido</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" data-toggle="modal" href="#addcontent">
							<i class="fas fa-image mr-2"></i>Contenido Multimedia
						</a>
						<a class="dropdown-item" data-toggle="modal" href="#addcontenttext">
							<i class="fas fa-edit mr-2"></i>Contenido Textual
						</a>
					</div>
				</li>
				
				<!-- Dropdown -->
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-plus"></i> Añadir Evaluacion</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" data-toggle="modal" href="#evaluacionnuevo">
							<i class="fas fa-image mr-2"></i>Preguntas
						</a>
						{{-- <a class="dropdown-item" data-toggle="modal" href="#verdfalsnuevo">
							<i class="fas fa-edit mr-2"></i>Verdadero/Falso
						</a> --}}
						<a class="dropdown-item" data-toggle="modal" href="#selectnuevo">
							<i class="fas fa-edit mr-2"></i>Selección
						</a>
					</div>
				</li>
			@endif

			<!-- Dropdown -->
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
				aria-expanded="false"><i class="fas fa-user mr-2"></i>{{ $me->people->type }}</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
					<a class="dropdown-item" href="{{ url('profile') }}">
						<i class="fas fa-user mr-2"></i>Perfil
					</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#"
						onclick="event.preventDefault();document.getElementById('logout-form').submit();">
						<i class="fas fa-power-off mr-2"></i>Salir
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
				</div>
			</li>

		</ul>
	</div>
	<!-- Collapsible content -->
</nav>
<!--/.Navbar-->

<!-- Modal añadir tema-->
<div class="modal fade" id="temanuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Añadir tema</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{ url('addtema') }}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="modal-body">

					<div class="form-group md-form ">
						<i class="fas fa-book prefix"></i>
						<input type="text" name="tema" id="tema" class="form-control validate {{ $errors->has('tema') ? ' is-invalid' : '' }}" placeholder="sin espacios entre palabras" required pattern="^[A-Za-z0-9_]+$">
						<label for="tema">Tema</label>
					</div>
					
					<div class="form-group md-form my-5">
						<i class="fas fa-edit prefix"></i>
						<textarea id="description" name="description" class="md-textarea form-control {{ $errors->has('description') ? ' is-invalid' : '' }}"></textarea>
						<label for="description">Descripción del tema</label>
					</div>
					
					<div class="form-group md-form">
						<div class="file-field">
							<a class="btn-floating aqua-gradient mt-0 float-left">
								<i class="fas fa-paperclip" aria-hidden="true"></i>
								<input type="file" name="topicimg" accept="image/*" required class="{{ $errors->has('topicimg') ? ' is-invalid' : '' }}">
							</a>
							<div class="file-path-wrapper">
								<input class="file-path validate" type="text" placeholder="Upload your image">
							</div>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn-md btn red lighten-1" data-dismiss="modal"><i class="fas fa-times mr-2"></i>Cerrar</button>
					<button type="submit" class="btn-md btn cyan lighten-2"><i class="fas fa-save mr-2"></i>Guardar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal añadir seccion-->
<div class="modal fade" id="seccionnueva" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Añadir seccion</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{ url('addseccion') }}" method="post">
				@csrf
				<div class="modal-body">
					<div class="form-group md-form ">
						<i class="fas fa-book prefix"></i>
						<input type="text" name="section" id="section" class="form-control validate {{ $errors->has('section') ? ' is-invalid' : '' }}" placeholder="Nombre de la seccion" required pattern="^[A-Za-z0-9_]+$">
						<label for="section">Seccion</label>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn-md btn red lighten-1" data-dismiss="modal"><i class="fas fa-times mr-2"></i>Cerrar</button>
					<button type="submit" class="btn-md btn cyan lighten-2"><i class="fas fa-save mr-2"></i>Guardar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal añadir evaluacion-->
<div class="modal fade" id="evaluacionnuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Añadir evaluación</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{ url('addevaluacion') }}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="modal-body">
					<div class="col md-form mt-5">
						<select class="mdb-select dropdown-primary md-form colorful-select {{ $errors->has('topic_id') ? ' is-invalid' : '' }}" name="topic_id" required id="tema">
							<option disabled selected>Escoge el tema de la evaluación</option>
							@foreach( $topics as $topic )
								<option value="{{ $topic->id }}">{{ $topic->topic }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group md-form my-5">
						<i class="fas fa-edit prefix"></i>
						<input id="note" type="number" name="note" class="form-control validate {{ $errors->has('note') ? ' is-invalid' : '' }}">
						<label for="note">Ponderacion total de la evaluacion</label>
					</div>
					<div class="form-group md-form my-5">
						<i class="fas fa-edit prefix"></i>
						<input id="time" type="number" name="time" class="form-control validate {{ $errors->has('time') ? ' is-invalid' : '' }}">
						<label for="time">Tiempo en minutos de la evaluacion</label>
					</div>
					<div class="col md-form">
						<select name="section_id" class="mdb-select colorful-select dropdown-primary {{ $errors->has('section_id') ? ' is-invalid' : '' }}" id="type" required>
							<option disabled selected>Selecciona la seccion</option>
							@foreach($sections as $section)
							<option value="{{ $section->id }}">{{ $section->section }}</option>
							@endforeach
						</select>
					</div>
					<input type="hidden" name="people_id" value="{{ Auth::user()->people_id }}">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn-md btn red lighten-1" data-dismiss="modal"><i class="fas fa-times mr-2"></i>Cerrar</button>
					<button type="submit" class="btn-md btn cyan lighten-2"><i class="fas fa-save mr-2"></i>Guardar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal añadir evaluacion de seleccion simple-->
<div class="modal fade" id="selectnuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Añadir evaluación, Selección</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{ url('addevaluacionsimple') }}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="modal-body">
					<div class="col md-form mt-5">
						<select class="mdb-select dropdown-primary md-form colorful-select {{ $errors->has('topic_id') ? ' is-invalid' : '' }}" name="topic_id" required id="tema">
							<option disabled selected>Escoge el tema de la evaluación</option>
							@foreach( $topics as $topic )
								<option value="{{ $topic->id }}">{{ $topic->topic }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group md-form my-5">
						<i class="fas fa-edit prefix"></i>
						<input id="note" type="number" name="note" class="form-control validate {{ $errors->has('note') ? ' is-invalid' : '' }}">
						<label for="note">Ponderacion total de la evaluacion</label>
					</div>
					<div class="form-group md-form my-5">
						<i class="fas fa-edit prefix"></i>
						<input id="time" type="number" name="time" class="form-control validate {{ $errors->has('time') ? ' is-invalid' : '' }}">
						<label for="time">Tiempo en minutos de la evaluacion</label>
					</div>
					<div class="col md-form">
						<select name="section_id" class="mdb-select colorful-select dropdown-primary {{ $errors->has('section_id') ? ' is-invalid' : '' }}" id="type" required>
							<option disabled selected>Selecciona la seccion</option>
							@foreach($sections as $section)
							<option value="{{ $section->id }}">{{ $section->section }}</option>
							@endforeach
						</select>
					</div>
					<input type="hidden" name="people_id" value="{{ Auth::user()->people_id }}">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn-md btn red lighten-1" data-dismiss="modal"><i class="fas fa-times mr-2"></i>Cerrar</button>
					<button type="submit" class="btn-md btn cyan lighten-2"><i class="fas fa-save mr-2"></i>Guardar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal añadir evaluacion de verdadero o falso-->
<div class="modal fade" id="verdfalsnuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Añadir evaluación, Verdadero o Falso</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{ url('addevaluacion') }}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="modal-body">
					<div class="col md-form mt-5">
						<select class="mdb-select dropdown-primary md-form colorful-select {{ $errors->has('topic_id') ? ' is-invalid' : '' }}" name="topic_id" required id="tema">
							<option disabled selected>Escoge el tema de la evaluación</option>
							@foreach( $topics as $topic )
								<option value="{{ $topic->id }}">{{ $topic->topic }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group md-form my-5">
						<i class="fas fa-edit prefix"></i>
						<input id="note" type="number" name="note" class="form-control validate {{ $errors->has('note') ? ' is-invalid' : '' }}">
						<label for="note">Ponderacion total de la evaluacion</label>
					</div>
					<div class="col md-form">
						<select name="section_id" class="mdb-select colorful-select dropdown-primary {{ $errors->has('section_id') ? ' is-invalid' : '' }}" id="type" required>
							<option disabled selected>Selecciona la seccion</option>
							@foreach($sections as $section)
							<option value="{{ $section->id }}">{{ $section->section }}</option>
							@endforeach
						</select>
					</div>
					<input type="hidden" name="people_id" value="{{ Auth::user()->people_id }}">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn-md btn red lighten-1" data-dismiss="modal"><i class="fas fa-times mr-2"></i>Cerrar</button>
					<button type="submit" class="btn-md btn cyan lighten-2"><i class="fas fa-save mr-2"></i>Guardar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal registrar contenido multimedia-->
<div class="modal fade" id="addcontent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Añadir contenido Multimedia</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{ url('addcontent') }}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="modal-body">

					<input type="hidden" name="peopleid" value="{{ Auth::user()->people_id }}">

					<div class="form-row">
						<div class="col">
							<label for="name">Nombre</label>
							<input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" required id="name">
						</div>
					</div>

					<div class="col md-form">
						<select name="section_id" class="mdb-select colorful-select dropdown-primary {{ $errors->has('section_id') ? ' is-invalid' : '' }}" id="type" required>
							<option disabled selected>Selecciona la seccion</option>
							@foreach($sections as $section)
							<option value="{{ $section->id }}">{{ $section->section }}</option>
							@endforeach
						</select>
					</div>

					<div class="form-row my-3">
						<div class="col">
							<label for="publicar"><i class="fas fa-edit mr-2"></i>Escribe una descripción</label>
							<textarea name="publicar" id="publicar" class="form-control {{ $errors->has('publicar') ? ' is-invalid' : '' }}" required></textarea>
						</div>
					</div>

					<div class="form-row">
						<div class="col">
							<label class="mdb-main-label">Tema en el cual registrar el contenido</label>
							<select class="browser-default custom-select {{ $errors->has('topicid') ? ' is-invalid' : '' }}" required name="topicid">
								<option selected disabled>Escoge un tema</option>
								@foreach( $topics as $t )
									<option value="{{ $t->id }}">{{ $t->topic }}</option>
								@endforeach
							</select>
						</div>
						<div class="col">
							<div class="d-flex justify-content-between align-items-center">
								<div class="file-field md-form">
									<div class="btn waves-effect teal accent-4 dark-text btn-sm float-left px-2">
										<i class="fas fa-file-upload fa-2x"></i>
										<input type="file" name="file">
									</div>
									<div class="file-path-wrapper">
										<input class="file-path validate form {{ $errors->has('file') ? ' is-invalid' : '' }}" type="text" placeholder="Sube un archivo" required>
									</div> 
								</div>
							</div>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button class="btn px-2 btn-sm red lighten-1 waves-effect" type="reset"><i class="fas fa-times mr-2"></i>Limpiar</button>
					<button class="btn px-2 btn-sm cyan lighten-2 waves-effect" type="submit"><i class="fas fa-send mr-2"></i>Publicar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- MODAL registrar contenido textual -->
<div class="modal fade" id="addcontenttext" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Añadir contenido Textual</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{ url('addcontenttext') }}" method="post">
				@csrf
				<div class="modal-body">

					<input type="hidden" name="peopleid" value="{{ Auth::user()->people_id }}">

					<div class="form-row">
						<div class="col">
							<label for="name">Nombre</label>
							<input type="text" name="nametext" class="form-control {{ $errors->has('nametext') ? ' is-invalid' : '' }}" required id="name">
						</div>
						<div class="col md-form">
							<select name="section_id" class="mdb-select {{ $errors->has('section_id') ? ' is-invalid' : '' }} colorful-select dropdown-primary" id="type" required>
								<option disabled selected>Selecciona la seccion</option>
								@foreach($sections as $section)
								<option value="{{ $section->id }}">{{ $section->section }}</option>
								@endforeach
							</select>
						</div>
						<div class="col">
							<label class="mdb-main-label">Tema en el cual registrar el contenido</label>
							<select class="browser-default custom-select" required name="topicid">
								<option selected disabled>Escoge un tema</option>
								@foreach( $topics as $t )
									<option value="{{ $t->id }}">{{ $t->topic }}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="form-row my-3">
						<div class="col">
							<label for="publicartext"><i class="fas fa-edit mr-2"></i>Contenido</label>
							<textarea name="publicartext" id="publicartext" rows="10" class="form-control {{ $errors->has('publicartext') ? ' is-invalid' : '' }}" required></textarea>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button class="btn px-2 btn-sm red lighten-1 waves-effect" type="reset"><i class="fas fa-times mr-2"></i>Limpiar</button>
					<button class="btn px-2 btn-sm cyan lighten-2 waves-effect" type="submit"><i class="fas fa-send mr-2"></i>Publicar</button>
				</div>
			</form>
		</div>
	</div>
</div>