@extends('install/installer')
@section('installer')

	        	<div class="body bg-white">
		        		<h2>Congratulations!</h2>
		        		<p>You've successfully installed MPress! Wasn't that easy?</p>
		        		<p>If you have any questions, issues, customisation requests or comments please get in touch with the developer on {{ HTML::link('https://github.com/MadMikeyB', 'GitHub' ) }}</p>
		        		<p>Enjoy!</p>
                </div>
                <div class="footer">
                	{{ HTML::link('/admin', 'Begin Creating!', array( 'class' => 'btn bg-light-blue btn-block' ) ) }}
				</div>
@stop