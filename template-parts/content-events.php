<?php
/**
 * Template part for displaying posts in page-events.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mbk
 */
?>

<h2 class="events-list-header">My 2024 Farmers Market Appearances</h2>
<p>New events and dates will be posted here as they are booked.</p>
<p>Looking forward to an exciting season, meeting new and old friends!</p>
<section class="events-items">
  <div class="events-item">
    <h3 class="events-item-header">Montpelier Farmers Market</h3>
    <p class="events-item-daytime">Saturdays 9:00am - 1:00pm</p>
    <!-- <p class="events-item-daytime">Winter Dates are held at the Barr Hill Distillery</p> -->
    <p class="events-item-days">August: 3rd, 10th, 17th, 24th, 31st</p>
    <p class="events-item-days">September: 7th, 14th, 21st, 28th</p>
    <p class="events-item-days">October: 5th, 19th, 26th</p>
    <a href="https://www.capitalcityfarmersmarket.com/">Farmers Market Site</a>
    <button class="events-item-button" data-id="montpelier">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 54.757 54.757" height="25" width="25" role="img" title="map icon"><path d="M27.557 12c-3.86 0-7 3.14-7 7s3.14 7 7 7 7-3.14 7-7-3.14-7-7-7zm0 12c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5z"/><path d="M40.94 5.617C37.318 1.995 32.502 0 27.38 0c-5.123 0-9.938 1.995-13.56 5.617C7.117 12.32 6.284 24.93 12.016 32.57L27.38 54.756 42.72 32.6c5.756-7.67 4.923-20.28-1.78-26.983zm.16 25.814L27.38 51.244 13.64 31.4c-5.2-6.932-4.455-18.32 1.595-24.37C18.48 3.788 22.792 2 27.38 2s8.9 1.787 12.146 5.03c6.05 6.05 6.795 17.438 1.573 24.4z"/></svg>
      Find On The Map
    </button>
  </div>

  <div class="events-item">
    <h3 class="events-item-header">Burlington Farmers Market</h3>
    <p class="events-item-daytime">Saturdays 9:00am - 2:00pm</p>
    <!-- <p class="events-item-daytime">Winter Dates are held at the Barr Hill Distillery</p> -->
    <p class="events-item-days">October: 12th</p>
    <a href="https://burlingtonfarmersmarket.org/">Farmers Market Site</a>
    <button class="events-item-button" data-id="burlington">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 54.757 54.757" height="25" width="25" role="img" title="map icon"><path d="M27.557 12c-3.86 0-7 3.14-7 7s3.14 7 7 7 7-3.14 7-7-3.14-7-7-7zm0 12c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5z"/><path d="M40.94 5.617C37.318 1.995 32.502 0 27.38 0c-5.123 0-9.938 1.995-13.56 5.617C7.117 12.32 6.284 24.93 12.016 32.57L27.38 54.756 42.72 32.6c5.756-7.67 4.923-20.28-1.78-26.983zm.16 25.814L27.38 51.244 13.64 31.4c-5.2-6.932-4.455-18.32 1.595-24.37C18.48 3.788 22.792 2 27.38 2s8.9 1.787 12.146 5.03c6.05 6.05 6.795 17.438 1.573 24.4z"/></svg>
      Find On The Map
    </button>
  </div>
  <!-- <div class="events-item">
    <h3 class="events-item-header">Montpelier Thanksgiving Market</h3>
    <p class="events-item-daytime">10:00pm - 2:00pm</p>
    <p class="events-item-daytime">Held at Montpelier High School</p>
    <p class="events-item-days">November: 18th</p>
    <button class="events-item-button" data-id="montpelier">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 54.757 54.757" height="25" width="25" role="img" title="map icon"><path d="M27.557 12c-3.86 0-7 3.14-7 7s3.14 7 7 7 7-3.14 7-7-3.14-7-7-7zm0 12c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5z"/><path d="M40.94 5.617C37.318 1.995 32.502 0 27.38 0c-5.123 0-9.938 1.995-13.56 5.617C7.117 12.32 6.284 24.93 12.016 32.57L27.38 54.756 42.72 32.6c5.756-7.67 4.923-20.28-1.78-26.983zm.16 25.814L27.38 51.244 13.64 31.4c-5.2-6.932-4.455-18.32 1.595-24.37C18.48 3.788 22.792 2 27.38 2s8.9 1.787 12.146 5.03c6.05 6.05 6.795 17.438 1.573 24.4z"/></svg>
      Find On The Map
    </button>
  </div> -->
  <!-- <div class="events-item">
    <h3 class="events-item-header">Waterbury Farmers Market</h3>
    <p class="events-item-daytime">Thursdays 4:00pm - 7:00pm</p>
    <p class="events-item-days">August: 31st</p>
    <p class="events-item-days">September: 7th</p>
    <button class="events-item-button" data-id="waterbury">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 54.757 54.757" height="25" width="25" role="img" title="map icon"><path d="M27.557 12c-3.86 0-7 3.14-7 7s3.14 7 7 7 7-3.14 7-7-3.14-7-7-7zm0 12c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5z"/><path d="M40.94 5.617C37.318 1.995 32.502 0 27.38 0c-5.123 0-9.938 1.995-13.56 5.617C7.117 12.32 6.284 24.93 12.016 32.57L27.38 54.756 42.72 32.6c5.756-7.67 4.923-20.28-1.78-26.983zm.16 25.814L27.38 51.244 13.64 31.4c-5.2-6.932-4.455-18.32 1.595-24.37C18.48 3.788 22.792 2 27.38 2s8.9 1.787 12.146 5.03c6.05 6.05 6.795 17.438 1.573 24.4z"/></svg>
      Find On The Map
    </button>
  </div> -->
  <!-- <div class="events-item">
    <h3 class="events-item-header">Art On Park - Stowe</h3>
    <p class="events-item-daytime">Thursdays 5:00pm - 8:00pm</p>
    <p class="events-item-days">July: 6th, 13th, 20th, 27th</p>
    <p class="events-item-days">August: 3rd, 10th, 17th, 24th</p>
    <button class="events-item-button" data-id="parkstreet">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 54.757 54.757" height="25" width="25" role="img" title="map icon"><path d="M27.557 12c-3.86 0-7 3.14-7 7s3.14 7 7 7 7-3.14 7-7-3.14-7-7-7zm0 12c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5z"/><path d="M40.94 5.617C37.318 1.995 32.502 0 27.38 0c-5.123 0-9.938 1.995-13.56 5.617C7.117 12.32 6.284 24.93 12.016 32.57L27.38 54.756 42.72 32.6c5.756-7.67 4.923-20.28-1.78-26.983zm.16 25.814L27.38 51.244 13.64 31.4c-5.2-6.932-4.455-18.32 1.595-24.37C18.48 3.788 22.792 2 27.38 2s8.9 1.787 12.146 5.03c6.05 6.05 6.795 17.438 1.573 24.4z"/></svg>
      Find On The Map
    </button>
  </div> -->
  <!-- <div class="events-item">
    <h3 class="events-item-header">Craftsbury Holiday Market</h3>
    <p class="events-item-daytime">The event is held inside Craftsbury Academy</p>
    <p class="events-item-days">Saturday, December 9th, 12:00pm - 4:00pm</p>
    <button class="events-item-button" data-id="craftsbury">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 54.757 54.757" height="25" width="25" role="img" title="map icon"><path d="M27.557 12c-3.86 0-7 3.14-7 7s3.14 7 7 7 7-3.14 7-7-3.14-7-7-7zm0 12c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5z"/><path d="M40.94 5.617C37.318 1.995 32.502 0 27.38 0c-5.123 0-9.938 1.995-13.56 5.617C7.117 12.32 6.284 24.93 12.016 32.57L27.38 54.756 42.72 32.6c5.756-7.67 4.923-20.28-1.78-26.983zm.16 25.814L27.38 51.244 13.64 31.4c-5.2-6.932-4.455-18.32 1.595-24.37C18.48 3.788 22.792 2 27.38 2s8.9 1.787 12.146 5.03c6.05 6.05 6.795 17.438 1.573 24.4z"/></svg>
      Find On The Map
    </button>
  </div> -->
  <!-- <div class="events-item">
    <h3 class="events-item-header">Autumn On The Green - Danville</h3>
    <p class="events-item-daytime">Sunday, 10:00am - 4:00pm</p>
    <p class="events-item-days">October: 6th</p>
    <button class="events-item-button" data-id="autumn">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 54.757 54.757" height="25" width="25" role="img" title="map icon"><path d="M27.557 12c-3.86 0-7 3.14-7 7s3.14 7 7 7 7-3.14 7-7-3.14-7-7-7zm0 12c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5z"/><path d="M40.94 5.617C37.318 1.995 32.502 0 27.38 0c-5.123 0-9.938 1.995-13.56 5.617C7.117 12.32 6.284 24.93 12.016 32.57L27.38 54.756 42.72 32.6c5.756-7.67 4.923-20.28-1.78-26.983zm.16 25.814L27.38 51.244 13.64 31.4c-5.2-6.932-4.455-18.32 1.595-24.37C18.48 3.788 22.792 2 27.38 2s8.9 1.787 12.146 5.03c6.05 6.05 6.795 17.438 1.573 24.4z"/></svg>
      Find On The Map
    </button>
  </div> -->
  <div class="events-item">
  <h3 class="events-item-header">Taste of New England</h3>
  <p class="events-item-daytime">Sunday, 12:00am - 4:00pm</p>
  <p class="events-item-days">August: 25th</p>
  <a href="https://www.sprucepeak.com/tone/sunday">Taste of New England Site</a>
    <button class="events-item-button" data-id="taste">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 54.757 54.757" height="25" width="25" role="img" title="map icon"><path d="M27.557 12c-3.86 0-7 3.14-7 7s3.14 7 7 7 7-3.14 7-7-3.14-7-7-7zm0 12c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5z"/><path d="M40.94 5.617C37.318 1.995 32.502 0 27.38 0c-5.123 0-9.938 1.995-13.56 5.617C7.117 12.32 6.284 24.93 12.016 32.57L27.38 54.756 42.72 32.6c5.756-7.67 4.923-20.28-1.78-26.983zm.16 25.814L27.38 51.244 13.64 31.4c-5.2-6.932-4.455-18.32 1.595-24.37C18.48 3.788 22.792 2 27.38 2s8.9 1.787 12.146 5.03c6.05 6.05 6.795 17.438 1.573 24.4z"/></svg>
      Find On The Map
    </button>
</div>
</section>
<div id="events-map" class="events-map"></div>