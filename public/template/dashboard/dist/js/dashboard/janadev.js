$(function () {
  'use strict'

  // Make the dashboard widgets sortable Using jquery UI
  $('.connectedSortable').sortable({
    placeholder: 'sort-highlight',
    connectWith: '.connectedSortable',
    handle: '.card-header, .nav-tabs',
    forcePlaceholderSize: true,
    zIndex: 999999
  })
  $('.connectedSortable .card-header').css('cursor', 'move')

  // The Calender
  $('#calendar').datetimepicker({
    format: 'L',
    inline: true
  })
})

$('.icon-toggle').on('click', function() {
  var input = $(this).closest('.input-group').find('.password');
  if(input.attr('type') === 'password') {
    input.attr('type', 'text');
    $(this).removeClass('fa-eye-slash').addClass('fa-eye');
  } else {
    input.attr('type', 'password');
    $(this).removeClass('fa-eye').addClass('fa-eye-slash');
  }
})

$('#agree').change(function() {
  if($(this).is(":checked")) {
    $('#btn-register').prop('disabled', false);
  } else {
    $('#btn-register').prop('disabled', true);
  }
})