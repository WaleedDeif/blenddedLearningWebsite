<script type="text/javascript">
function submit_exam(){
		$("#please_ansewer_all").hide();
	 	var count_all_QS = 0;
	 	var count_all_QS_AnsrS = 0;
	 	$('form input[class=qd]').each(function(){
			var qId = $(this).attr("id");
			
			if($('input[name=question_id_'+qId+']:checked').length>0){
				 $(".question_lbl_"+qId).removeClass('not-ans');
          		  count_all_QS_AnsrS++;
        	}else{
        		$(".question_lbl_"+qId).addClass('not-ans');
        	}
 			count_all_QS++;
		});
		if(count_all_QS == count_all_QS_AnsrS){
			return true;
		}else{
			$("#please_ansewer_all").show();
			$("html, body").animate({ scrollTop: $('#please_ansewer_all').offset().top - 100 }, 500);
			return false;
		}
}
function select_answer(q,a){

	$(".question_id_"+q+" i").removeClass("fa-check");
	$(".question_id_"+q+" span").removeClass("selected-answer");
	$(".question_id_"+q+" i.ans-i-"+a).addClass("fa-check");
	$(".question_id_"+q+" span.ans_"+a).addClass("selected-answer");
}
</script>