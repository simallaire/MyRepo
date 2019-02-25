@extends('layouts.app')

@section('content')
 	<form action="/language" method="post">
	<ul class="list-group">

	<meta name="csrf-token" content="{{ csrf_token() }}">	
	@php
		$i = 0;
	@endphp
	@foreach($languages as $language)

			<li class="list-group-item">
				<div class="displaydiv" style="display: inline-block;" id="{{ $language->id }}">
					<input type="checkbox" class="checkbox" name="cb{{ $i++ }}" value="{{ $language->id }}" />
					<b id="b{{ $language->id }}">{{ $language->name }}</b>
					<i id="{{ $language->id }}" class="fa fa-edit"></i> 
				</div>
				<div class="editdiv" style="display: inline-block;" id="{{ $language->id }}">
					<input type="text" class="editText form-control" style="display: inline-block;" value="{{ $language->name }}" id="{{ $language->id }}"  name="edit{{ $language->id }}" /> 
					<i id="{{ $language->id }}"   class="fa fa-times"></i>
					<i id="{{ $language->id }}"   class="fa fa-check"></i>
				</div>
				(<a href="/language/{{ $language->id }}" title="">{{ $language->projects->count() }}</a>)

			</li>
 	

	@endforeach
	</ul>
	<button type="submit" disabled="disabled" id="btnMerge" class="btn btn-primary btn-block">Merge Languages</button>
 	</form>
 	<p>*By default, the least popular language will be merged to the most popular one.</p>

 	<script>
 		$(document).ready(function(){
 			$(".editdiv").hide();


 			$(".checkbox").click(function(){

 				var cbs = $(".checkbox");
 				var count = 0;

 				$.each(cbs,function(){
 					if($(this).prop('checked')){
 						count++;
 					}
 					
 				});
 				if(count==2){
 					$("#btnMerge").removeAttr('disabled');
 				}else{
 					$("#btnMerge").attr('disabled','disabled');
 				}
				// console.log(count);

 			});
 			$(".fa-edit").click(function(){

              var id = $(this).attr("id");
              
              $("#"+id+".displaydiv").hide();
              $("#"+id+".editdiv").show();

          		
 			});
 			$(".fa-times").click(function(){
              
              var id = $(this).attr("id");

              $("#"+id+".displaydiv").show();
              $("#"+id+".editdiv").hide();

 			});
 			$(".fa-check").click(function(){
	           $.ajaxSetup({
	              headers: {
	                  'X-CSRF-TOKEN': "{{ @csrf_token() }}"
	              }
	          });
 				var id = $(this).attr("id");
 				var name = $("#"+id+".editText").val();
               $.ajax({
                  url: "language/"+id,
                  type: 'PUT',
                  data: {
                     name: name,
                     id: id,
                  },
                  success: function(result){
					$("#b"+id).html(result.name); 
	              	$("#"+id+".displaydiv").show();
              		$("#"+id+".editdiv").hide();                   
                     alert(result.success);
                  }
              });
            
 			});

 		});

 	</script>
@endsection