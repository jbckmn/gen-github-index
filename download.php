<?php

if(empty($_POST['filename']) || empty($_POST['content'])){
	exit;
}

$filename = preg_replace('/[^a-z0-9\-\_\.]/i','',$_POST['filename']);

header("Cache-Control: ");
header("Content-type: text/plain");
header('Content-Disposition: attachment; filename="'.$filename.'"');

echo '
<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<title>Open-source code from ' . $_POST['content'] . ' on Github</title>
	<meta name="viewport" content="width=device-width" />
	<link rel="shortcut icon" href="favicon.ico">
	<style>
	body {
		color: #666;
		background-color: #fff;
		font-family: "Helvetica Neue", helvetica, arial, sans-serif;
		font-size: 13px;
		margin: 0;
		padding-bottom: 2em;
	}
	footer{
		text-align: center;
		font-size: 0.8em;
	}
	footer a{
		padding: 0.5em 1em;
	}
	h1{
		font-size: 1.5em;
		margin: 0;
		padding: 0;
		padding-top: 2em;
	}
	h1 a{
		display: block;
		line-height: 20px;
		padding: 2em;
		padding-right: 1.5em;
		border-bottom: 1px solid #ddd;
	}
	#projects-count{
		font-weight: normal;
		color: #ccc;
		display: inline-block;
		line-height: 1.3em;
		margin-left: .5em;
	}
	a{
		color: #666;
		background-color: transparent;
		text-decoration: none;
		-webkit-transition: all .2s;
		-moz-transition: all .2s;
		-ms-transition: all .2s;
		-o-transition: all .2s;
		transition: all .2s;
	}
	a:hover{
		color: #fff;
		background-color: #666;
	}
	#repos-list, #stars-list{
		margin: 0;
		padding: 0;
		list-style: none;
	}
	#repos-list li, #stars-list li{
		display: inline;
	}
	#repos-list li a, #stars-list li a{
		position: relative;
		display: block;
		line-height: 20px;
		padding: 1em 3em;
		overflow: hidden;
	}
	/*
	#repos-list li:nth-child(odd) a, #stars-list li:nth-child(odd) a{
		background-color: #fafafa;
	}
	*/
	#repos-list li a:hover, #stars-list li a:hover{
		color: #fff;
		background-color: #666;
	}
	#repos-list li.fork a:before, #stars-list li.fork a:before{
		color: #999;
		content: \'\2646\';
		position: absolute;
		left: 5px;
		-webkit-transform: rotate(90deg);
		-moz-transform: rotate(90deg);
		-ms-transform: rotate(90deg);
		-o-transform: rotate(90deg);
		transform: rotate(90deg);
	}
	#repos-list li a .desc, #stars-list li a .desc{
		color: #fff;
		display: inline-block;
		line-height: 1.3em;
		margin-left: .5em;
	}
	#projects-info,
	#repos-list li a .info, #stars-list li a .info{
		float: right;
		clear: right;
	}
	#projects-info{
		font-size: 13px;
		padding-right: 0.7em; 
	}
	b.stars,
	b.forks{
		font-weight: bold;
		display: inline-block;
	}
	b.stars:before,
	b.forks:before{
		display: inline-block;
		font-size: 14px;
		width: 20px;
		text-align: center;
	}
	b.stars:before{
		content: \'\2605\';
	}
	b.forks:before{
		content: \'\2646\';
	}
	.user-image{
		border-radius: 50px;
		width: 30px;
		vertical-align: middle;
		margin-right: 0.3em;
	}
	.Arduino{color: #bd79d1;}
	.Java{color: #b07219;}
	.VHDL{color: #543978;}
	.Scala{color: #7dd3b0;}
	.Emacs .Lisp{color: #c065db;}
	.Delphi{color: #b0ce4e;}
	.Ada{color: #02f88c;}
	.VimL{color: #199c4b;}
	.Perl{color: #0298c3;}
	.Lua{color: #fa1fa1;}
	.Rebol{color: #358a5b;}
	.Verilog{color: #848bf3;}
	.Factor{color: #636746;}
	.Ioke{color: #078193;}
	.R{color: #198ce7;}
	.Erlang{color: #949e0e;}
	.Nu{color: #c9df40;}
	.AutoHotkey{color:#6594b9;}
	.Clojure{color: #db5855;}
	.Shell{color: #5861ce;}
	.Assembly{color: #a67219;}
	.Parrot{color: #f3ca0a;}
	.C#{color: #5a25a2;}
	.Turing{color: #45f715;}
	.AppleScript{color: #3581ba;}
	.Eiffel{color: #946d57;}
	.Common .Lisp{color: #3fb68b;}
	.Dart{color: #cccccc;}
	.SuperCollider{color: #46390b;}
	.CoffeeScript{color: #244776;}
	.XQuery{color: #2700e2;}
	.Haskell{color: #29b544;}
	.Racket{color: #ae17ff;}
	.Elixir{color: #6e4a7e;}
	.HaXe{color: #346d51;}
	.Ruby{color: #701516;}
	.Self{color: #0579aa;}
	.Fantom{color: #dbded5;}
	.Groovy{color: #e69f56;}
	.C{color: #555;}
	.JavaScript{color: #f15501;}
	.D{color: #fcd46d;}
	.ooc{color: #b0b77e;}
	.C++{color: #f34b7d;}
	.Dylan{color: #3ebc27;}
	.Nimrod{color: #37775b;}
	.Standard .ML{color: #dc566d;}
	.Objective-C{color: #f15501;}
	.Nemerle{color: #0d3c6e;}
	.Mirah{color: #c7a938;}
	.Boo{color: #d4bec1;}
	.Objective-J{color: #ff0c5a;}
	.Rust{color: #dea584;}
	.Prolog{color: #74283c;}
	.Ecl{color: #8a1267;}
	.Gosu{color: #82937f;}
	.FORTRAN{color: #4d41b1;}
	.ColdFusion{color: #ed2cd6;}
	.OCaml{color: #3be133;}
	.Fancy{color: #7b9db4;}
	.Pure .Data{color: #f15501;}
	.Python{color: #3581ba;}
	.Tcl{color: #e4cc98;}
	.Arc{color: #ca2afe;}
	.Puppet{color: #cc5555;}
	.Io{color: #a9188d;}
	.Max{color: #ce279c;}
	.Go{color: #8d04eb;}
	.ASP{color: #6a40fd;}
	 .Visual .Basic{color: #945db7;}
	.PHP{color: #6e03c1;}
	.Scheme{color: #1e4aec;}
	.Vala{color: #3581ba;}
	.Smalltalk{color: #596706;}
	.Matlab{color: #bb92ac;}
	.C#{color: #bb92af;}
	@media only screen and (max-width: 768px) {
		#repos-list li a .desc, #stars-list li a .desc{display: none;}
		h1{font-size: 13px;}
		#projects-info{padding-right: 1.5em; }
		footer{display: none;}
	}
	@media only screen and (max-width: 460px) {
		body{font-size: 10px;}
	}
	</style>
</head>
<body>
	<h1><a href="http://github.com/' . $_POST['content'] . '"><span id="projects-info"></span>Open-source code from ' . $_POST['content'] . ' <span id="projects-count"></span> </a></h1>
	<ul id="repos-list"></ul>
	<h1 title="stars" id="stars"><a href="#stars"><span id="stars-count"></span> </a></h1>
	<ul id="stars-list"></ul>
	<footer>
		<p><a href="http://bckmn.com/code/gen">Build your own Github index</a></p>
	</footer>
	<script>
	var reposList = document.getElementById(\'repos-list\'),
		starsList = document.getElementById(\'stars-list\'),
		starsCount = document.getElementById(\'stars-count\'),
		linkOut = document.getElementById(\'link-out\'),
		projectsCount = document.getElementById(\'projects-count\'),
		projectsInfo = document.getElementById(\'projects-info\'),
		load = function(data){
			if (!data || !data.data || !data.data.length) return;
			var repositories = data.data,
				html = \'\';
			repositories.sort(function(a, b){
				var aFork = a.fork, bFork = b.fork;
				if (aFork && !bFork) return 1;
				if (!aFork && bFork) return -1;
				return new Date(b.pushed_at) - new Date(a.pushed_at);
			});
			var image = repositories[1].owner.avatar_url;
			var l = repositories.length, lp = 0, lf = 0, w = 0, f = 0;
			for (var i=0; i<l; i++){
				var r = repositories[i],
					fork = r.fork ? \' class="fork"\' : \'\',
					watchers = r.watchers,
					forks = r.forks;
				w += r.watchers;
				f += r.forks;
				fork ? lf++ : lp++;
				html += \'<li\' + fork + \'>\'
					+ \'<a href="\' + r.html_url + \'">\'
					+ \'<span class="info"><b class="language \' + (r.language || \'\') + \'">\' + (r.language || \'\') + \'</b> <b class="stars">\' + watchers + \'</b> <b class="forks">\' + forks + \'</b></span>\'
					+ \'<b>\' + r.name + \'</b> \'
					+ \'<span class="desc">\' + r.description + \'</span>\'
					+ \'</a>\';
			}
			reposList.innerHTML = html;
			projectsCount.innerHTML = l + \' repositories (\' + lp + \' public + \' + lf + \' forks)\';
			projectsInfo.innerHTML = \'<img class="user-image" src="\' + image + \'" /><b class="stars">\' + w + \'</b> <b class="forks">\' + f + \'</b>\';
		};
		starred = function(data){
			if (!data || !data.data || !data.data.length) return;
			var stars = data.data,
				html = \'\';
			stars.sort(function(a, b){
				return new Date(b.pushed_at) - new Date(a.pushed_at);
			});
			var s = stars.length, lp = 0, lf = 0;
			for (var i=0; i<s; i++){
				var r = stars[i],
					fork = r.fork ? \' class="fork"\' : \'\',
					watchers = r.watchers,
					forks = r.forks;
				fork ? lf++ : lp++;
				html += \'<li\' + fork + \'>\'
					+ \'<a href="\' + r.html_url + \'">\'
					+ \'<span class="info"><b class="language \' + (r.language || \'\') + \'">\' + (r.language || \'\') + \'</b></span>\'
					+ \'<b>\' + r.full_name + \'</b> \'
					+ \'<span class="desc">\' + r.description + \'</span>\'
					+ \'</a>\';
			}
			starsList.innerHTML = html;
			starsCount.innerHTML = \'Watching \' + s + \' stars\';
		};
	</script>
	<script src="https://api.github.com/users/' . $_POST['content'] . '/repos?callback=load&per_page=100"></script>
	<script src="https://api.github.com/users/' . $_POST['content'] . '/starred?callback=starred&per_page=500"></script>
</body>
';

?>