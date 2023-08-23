<?php

function active_class($path, $active = 'active')
{
  return call_user_func_array('Request::is', (array)$path) ? $active : '';
}

function is_active_route($path)
{
  return call_user_func_array('Request::is', (array)$path) ? 'true' : 'false';
}

function show_class($path)
{
  return call_user_func_array('Request::is', (array)$path) ? 'show' : '';
}

function getStarRatingHtml($rating)
{
  $fullStars = intval($rating);
  $hasHalfStar = $rating - $fullStars >= 0.5;
  $emptyStars = 5 - $fullStars - ($hasHalfStar ? 1 : 0);

  $fullStarHtml = '<i class="bi-star-fill color"></i>';
  $halfStarHtml = '<i class="bi-star-half color"></i>';
  $emptyStarHtml = '<i class="bi-star color"></i>';

  $html = '';
  for ($i = 0; $i < $fullStars; $i++) {
    $html .= $fullStarHtml;
  }
  if ($hasHalfStar) {
    $html .= $halfStarHtml;
  }
  for ($i = 0; $i < $emptyStars; $i++) {
    $html .= $emptyStarHtml;
  }
  return $html;
}
