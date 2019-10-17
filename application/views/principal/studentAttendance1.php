<div class="calendar-wrap">
    <div class="cal-nav">
        <a href="javascript:void(0);" onclick="getCalendar('calendar_div','<?php echo date("Y",strtotime($calendar['date'].' - 1 Month')); ?>','<?php echo date("m",strtotime($calendar['date'].' - 1 Month')); ?>');">&laquo;</a>
        <select class="month_dropdown"><?php echo $monthOptions; ?></select>
        <select class="year_dropdown"><?php echo $yearOptions; ?></select>
        <a href="javascript:void(0);" onclick="getCalendar('calendar_div','<?php echo date("Y",strtotime($calendar['date'].' + 1 Month')); ?>','<?php echo date("m",strtotime($calendar['date'].' + 1 Month')); ?>');">&raquo;</a>
    </div>
    <div id="event_list" class="none"></div>
    <div class="calendar-days">
        <ul>
            <li>SUN</li>
            <li>MON</li>
            <li>TUE</li>
            <li>WED</li>
            <li>THU</li>
            <li>FRI</li>
            <li>SAT</li>
        </ul>
    </div>
    <div class="calendar-dates">
        <ul>
        <?php  
            $dayCount = 1; 
            $eventNum = 0; 
            for($cb=1;$cb<=$calendar['boxDisplay'];$cb++){ 
                if(($cb >= $calendar['currentMonthFirstDay']+1 || $calendar['currentMonthFirstDay'] == 7) && $cb <= ($calendar['totalDaysOfMonthDisplay'])){ 
                    // Current date 
                    $dayCount = ($dayCount < 10 && strpos($dayCount, '0') == false)?'0'.$dayCount:$dayCount; 
                    $currentDate = $calendar['dateYear'].'-'.$calendar['dateMonth'].'-'.$dayCount; 
                     
                    // Get number of events based on the current date 
                    $eventNum = 0; 
                    if(!empty($events)){ 
                        $eventData = array_filter($events, function ($var) use ($currentDate) { 
                            return ($var['date'] == $currentDate); 
                        }); 
                        $eventData = array_values($eventData); 
                        $eventData = !empty($eventData[0])?$eventData[0]:''; 
                        $eventNum = !empty($eventData['event_num'])?$eventData['event_num']:0; 
                    } 
                     
                    // Define date cell color 
                    if(strtotime($currentDate) == strtotime(date("Y-m-d"))){ 
                        echo '<li date="'.$currentDate.'" class="grey date_cell">'; 
                    }elseif($eventNum > 0){ 
                        echo '<li date="'.$currentDate.'" class="light_sky date_cell">'; 
                    }else{ 
                        echo '<li date="'.$currentDate.'" class="date_cell">'; 
                    } 
                     
                    // Date cell 
                    echo '<span>'; 
                    echo $dayCount; 
                    echo '</span>'; 
                     
                    // Hover event popup 
                    // echo '<div id="date_popup_'.$currentDate.'" class="date_popup_wrap none">'; 
                    // echo '<div class="date_window">'; 
                    // echo '<div class="popup_event">Events ('.$eventNum.')</div>'; 
                    // echo ($eventNum > 0)?'<a href="javascript:void(0);" onclick="getEvents(\''.$currentDate.'\');">view events</a>':''; 
                    // echo '</div></div>'; 
                     
                    echo '</li>'; 
                    $dayCount++; 
        ?>
        <?php }else{ ?>
            <li><span>&nbsp;</span></li>
        <?php } } ?>
        </ul>
    </div>
</div>



<script>
    function getCalendar(target_div, year, month){
        $.get( '<?php echo base_url('attendanceCal/eventCalendar/'); ?>'+year+'/'+month, function( html ) {
            $('#'+target_div).html(html);
        });
    }

function getEvents(date){
    $.get( '<?php echo base_url('attendanceCal/getEvents/'); ?>'+date, function( html ) {
        $('#event_list').html(html);
        $('#event_list').slideDown('slow');
    });
}

$(document).on("mouseenter", ".date_cell", function(){
    date = $(this).attr('date');
    $(".date_popup_wrap").fadeOut();
    $("#date_popup_"+date).fadeIn();
});
$(document).on("mouseleave", ".date_cell", function(){
    $(".date_popup_wrap").fadeOut();
});
$(document).on("change", ".month_dropdown", function(){
    getCalendar('calendar_div', $('.year_dropdown').val(), $('.month_dropdown').val());
});
$(document).on("change", ".year_dropdown", function(){
    getCalendar('calendar_div', $('.year_dropdown').val(), $('.month_dropdown').val());
});
$(document).click(function(){
    $('#event_list').slideUp('slow');
});
    </script>
<style>
body{
    font-family: Arial, Helvetica, sans-serif;
}
.none{
    display:none;
}
.calendar-wrap{
    width:700px;
    margin:30px auto 0;
}
.calendar-wrap .cal-nav{
    background-color:#efefef;
    color:#444444;
    font-size:17px;
    text-align:center;
    line-height:40px;
    padding: 5px 8px;
}
.calendar-wrap .cal-nav a{
    color:#F58220;
    float:none;
    text-decoration: none;
    font-size: 2.5em;
    line-height: 35px;
}
.calendar-wrap .cal-nav a:hover{
    color:#D65E02;
}
.calendar-wrap .cal-nav a:first-child{
    float: left;
}
.calendar-wrap .cal-nav a:last-child{
    float: right;
}
.calendar-wrap select{
    color: #444444;
    font-size:17px;
}
.calendar-days{
    width:100%;
    float:left;
    margin-top:20px;
}
.calendar-days ul{
    padding:0;
    list-style-type:none;
}
.calendar-days ul li{
    float:left;
    display:block;
    width:99px;
    border-right:1px solid #fff;
    text-align:center;
    font-size:14px;
    min-height:0;
    background:none;
    box-shadow:none;
    margin:0;
    padding:0;
}
.calendar-dates{
    width:100%;
    margin-top:20px;
    float:left;
    border-left:1px solid #ccc;
    border-bottom:1px solid #ccc;
}
.calendar-dates ul{
    margin:0;
    padding:0;
    list-style-type:none;
}
.calendar-dates ul li{
    float:left;
    width:99px;
    height:80px;
    text-align:center;
    border-top:1px solid #ccc;
    border-right:1px solid #ccc;
    min-height:0;
    background:none;
    box-shadow:none;
    margin:0;
    padding:0;
    position:relative;
}
.calendar-dates ul li span{
    margin-top:7px;
    float:left;
    margin-left:7px;
    text-align:center;
}

.grey{
    background-color:#DDDDDD !important;
}
.light_sky{
    background-color:#B9FFFF !important;
}

/*========== Hover Popup ===============*/
.date_cell {
    cursor: pointer;
    cursor: hand;
}
.date_cell:hover {
    background: #DDDDDD !important;
}
.date_popup_wrap {
    position: absolute;
    width: 143px;
    height: 115px;
    z-index: 9999;
    top: -115px;
    left:-55px;
    background: transparent url(../images/info-popup.png) no-repeat top left;
    color: #666 !important;
}
.events_window {
    overflow: hidden;
    overflow-y: auto;
    width: 133px;
    height: 115px;
    margin-top: 28px;
    margin-left: 25px;
}
.event_wrap {
    margin-bottom: 10px; padding-bottom: 10px;
    border-bottom: solid 1px #E4E4E7;
    font-size: 12px;
    padding: 3px;
}
.date_window {
    margin-top:20px;
    margin-bottom: 2px;
    padding: 5px;
    font-size: 16px;
    margin-left:9px;
    margin-right:14px
}
.popup_event {
    margin-bottom: 2px;
    padding: 2px;
    font-size: 16px;
    width:100%;
}
.popup_event a {
    color: #000000 !important;
}
.popup_event a:hover {
    color: #181919;
    text-decoration: underline;
}

@media only screen and (min-width:480px) and (max-width:767px) {
    .calendar-wrap{ width:336px;}
    .calendar-days ul li{ width:47px;}
    .calendar-dates ul li{ width:47px;}
}
@media only screen and (min-width: 320px) and (max-width: 479px) {
    .calendar-wrap{ width:219px;}
    .calendar-days ul li{ width:30px; font-size:11px;}
    .calendar-dates ul li{ width:30px;}
    .calendar-dates{ width:217px;}
    .calendar-dates ul li{ height:50px;}
}

@media only screen and (min-width: 768px) and (max-width: 1023px) {
    .calendar-wrap{ width:530px;}
    .calendar-days ul li{ width:74px;}
    .calendar-dates ul li{ width:74px;}
    .calendar-dates{ width:525px;}
    .calendar-dates ul li{ height:50px;}
}
</style>
