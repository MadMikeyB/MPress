@extends('install/installer')
@section('installer')

	        	<div class="body bg-white">
		        		<p>Welcome to MPress!</p>
		        		<p>There are many reasons to choose MPress, such as</p>
		        		<p>
		        		<ul>
		        			<li>Articles Management System</li>
		        			<ul>
		        				<li>Rich Text Editor</li>
		        				<li>Automatic YouTube Video Embeds via link posting</li>
		        				<li>Article Image via in-browser upload</li>
		        				<li>Featured Article System</li>
		        				<li>Article Slider System (Requires front-end slider)</li>
		        				<li>Facebook Comments</li>
		        				<li>Article Views Tracker</li>
		        			</ul>
		        			<li>Page Management System</li>
		        			<ul>
		        				<li>Rich Text Editor</li>
		        			</ul>
		        			<li>Easy Menu Management</li>
		        			<li>User Management</li>
		        			<li>Admin Control Panel featuring</li>
		        			<ul>
		        				<li>Easy to use Dashboard</li>
		        				<li>At a glance site statistics</li>
		        				<li>Most popular post, most popular author, latest pages and latest posting lists</li>
		        				<li>Conversion from WordPress</li>
		        			</ul>	
		        		</ul>
		        		</p>
		        		<p>So what are you waiting for? You're seconds away from your very own website :)</p>

                </div>
                <div class="footer">
                	{{ HTML::link('/install/database', 'Get Started', array( 'class' => 'btn bg-light-blue btn-block' ) ) }}
				</div>
@stop