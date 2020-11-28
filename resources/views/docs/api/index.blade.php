@extends('layouts.api')

@section('title', 'Home')

@section('content')
    <div class="content">
        <div class="sidebar pt-3">
            <div class="sidebar-head d-flex mb-3 pr-2">
                <div class="logo mr-auto">
                    <div class="logo-light">                        
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 389.3 60.1"><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path d="M38.5,61.2,36.6,48.6H16.9l-7,12.6H0L29.5,10.8h9.9l8,50.4ZM33.1,20.8V18.4H33a33.4,33.4,0,0,1-1.6,3.8L20.5,41.5H35.7l-2.4-19A7.2,7.2,0,0,1,33.1,20.8Z" transform="translate(0 -4.8)" style="fill:#333"/><path d="M82.7,33.7a13,13,0,0,0-3.3-1.9A12.7,12.7,0,0,0,75,31a10.4,10.4,0,0,0-6.1,2,13,13,0,0,0-4.5,5.7,17.8,17.8,0,0,0-1.8,7.8c0,2.9.7,5.1,2,6.6a6.9,6.9,0,0,0,5.5,2.3,13.9,13.9,0,0,0,4.7-.9,19.3,19.3,0,0,0,4.3-2.2l-1.4,7.2a22.2,22.2,0,0,1-10,2.6c-4.2,0-7.6-1.3-10-3.9s-3.6-6.3-3.6-10.9a25.4,25.4,0,0,1,2.7-11.6A20.2,20.2,0,0,1,75.3,24.3a22.2,22.2,0,0,1,5.1.6,14.8,14.8,0,0,1,3.9,1.6Z" transform="translate(0 -4.8)" style="fill:#333"/><path d="M118.6,34.1c0,4.3-2,7.5-6.1,9.5s-10.1,3.2-18.3,3.3V48a7,7,0,0,0,2.2,5.6,8.4,8.4,0,0,0,6.1,2.1,20.1,20.1,0,0,0,5.7-1,31.7,31.7,0,0,0,5.6-2.5l-1.4,7a24.8,24.8,0,0,1-11.8,2.9c-4.6,0-8.3-1.3-10.9-3.9s-3.9-6.3-3.9-11a25.3,25.3,0,0,1,2.7-11.5,20.6,20.6,0,0,1,7.4-8.3,18.7,18.7,0,0,1,10.5-3.1q5.7,0,9,2.7A8.6,8.6,0,0,1,118.6,34.1Zm-8.2.2a3.6,3.6,0,0,0-1.3-2.8,5.7,5.7,0,0,0-3.6-1.1,9.5,9.5,0,0,0-6.7,3.1,14.8,14.8,0,0,0-4,7.5C105.2,41,110.4,38.8,110.4,34.3Z" transform="translate(0 -4.8)" style="fill:#333"/><path d="M130.6,61.8c-2.6,0-4.6-.6-6-1.9a7.4,7.4,0,0,1-2-5.5,45.8,45.8,0,0,1,1.3-8.5c.9-4.1,3.6-16.8,8.1-38h8.6l-8.6,40a42.9,42.9,0,0,0-.7,4.5c0,1.8,1,2.7,3.1,2.7a8.3,8.3,0,0,0,3.2-.6L136.2,61A21,21,0,0,1,130.6,61.8Z" transform="translate(0 -4.8)" style="fill:#333"/><path d="M151.3,61.8c-2.6,0-4.6-.6-5.9-1.9a7.1,7.1,0,0,1-2.1-5.5,48.8,48.8,0,0,1,1.4-8.5c.9-4.1,3.6-16.8,8.1-38h8.5l-8.5,40a25.8,25.8,0,0,0-.7,4.5q0,2.7,3,2.7a7.9,7.9,0,0,0,3.2-.6L157,61A21.2,21.2,0,0,1,151.3,61.8Z" transform="translate(0 -4.8)" style="fill:#333"/><path d="M196.3,34.1a10,10,0,0,1-6,9.5c-4.1,2.1-10.2,3.2-18.4,3.3V48a7.4,7.4,0,0,0,2.2,5.6,8.5,8.5,0,0,0,6.1,2.1,20.1,20.1,0,0,0,5.7-1,31.7,31.7,0,0,0,5.6-2.5l-1.4,7a24.7,24.7,0,0,1-11.7,2.9c-4.7,0-8.3-1.3-10.9-3.9s-4-6.3-4-11a25.3,25.3,0,0,1,2.7-11.5,20.8,20.8,0,0,1,7.5-8.3A18.4,18.4,0,0,1,184,24.3q5.7,0,9,2.7A8.6,8.6,0,0,1,196.3,34.1Zm-8.2.2a3.3,3.3,0,0,0-1.3-2.8,5.4,5.4,0,0,0-3.5-1.1,9.6,9.6,0,0,0-6.8,3.1,15.6,15.6,0,0,0-4,7.5C182.9,41,188.1,38.8,188.1,34.3Z" transform="translate(0 -4.8)" style="fill:#333"/><path d="M339.5,64h-8.6c0-.6.1-1.7.2-3.2s.3-2.8.5-3.6h-.2a31.5,31.5,0,0,1-3.8,4.7,12.9,12.9,0,0,1-3.5,2.2,10.8,10.8,0,0,1-4.2.8,9.5,9.5,0,0,1-8-3.7c-1.9-2.4-2.8-5.7-2.8-10a25.9,25.9,0,0,1,3.1-12.4,20.1,20.1,0,0,1,8.2-8.8,24.2,24.2,0,0,1,12-2.9,67,67,0,0,1,13.5,1.7l-5,23.5a58.3,58.3,0,0,0-.9,6.1A51.3,51.3,0,0,0,339.5,64Zm-3.2-30a18.6,18.6,0,0,0-4.8-.5,12.4,12.4,0,0,0-7.1,2.1,14.5,14.5,0,0,0-4.9,6.3,22.6,22.6,0,0,0-1.9,8.9,9.1,9.1,0,0,0,1.4,5.4,4.4,4.4,0,0,0,3.9,1.9q3.9,0,6.9-3.9a26.6,26.6,0,0,0,4.4-10.5Z" transform="translate(0 -4.8)" style="fill:#4db7e8"/><path d="M358.6,64.6a8.1,8.1,0,0,1-5.9-2,7.1,7.1,0,0,1-2.1-5.5,19.8,19.8,0,0,1,.4-3.6L356.3,28h8.5L360,50.7a25.8,25.8,0,0,0-.7,4.5c0,1.8,1,2.7,3.1,2.7a7.8,7.8,0,0,0,3.1-.6l-1.3,6.5A23.6,23.6,0,0,1,358.6,64.6Zm9.5-48.8a4.5,4.5,0,0,1-1.5,3.5,5.3,5.3,0,0,1-3.7,1.4,5.2,5.2,0,0,1-3.6-1.3,4.2,4.2,0,0,1-1.4-3.3,4.4,4.4,0,0,1,1.5-3.5,5.7,5.7,0,0,1,3.8-1.3,5.5,5.5,0,0,1,3.5,1.2A4.5,4.5,0,0,1,368.1,15.8Z" transform="translate(0 -4.8)" style="fill:#4db7e8"/><path d="M379.3,64.6a8.1,8.1,0,0,1-5.9-2,6.9,6.9,0,0,1-2.1-5.4,48.8,48.8,0,0,1,1.4-8.5c.8-4.1,3.5-16.8,8-38h8.6l-8.5,40a30.4,30.4,0,0,0-.8,4.5c0,1.8,1.1,2.7,3.1,2.7a7.9,7.9,0,0,0,3.2-.6L385,63.8A21.2,21.2,0,0,1,379.3,64.6Z" transform="translate(0 -4.8)" style="fill:#4db7e8"/><path d="M307.4,4.9,310,8.1a4.3,4.3,0,0,0-.2,1.1c-.1.2-.1.4-.2.6L297.9,63.9H284.5l10.3-44c-9.6,9.8-19.1,19.7-28.7,29.6l-4.2-.6L246.7,21.7c-3.6,14-7.1,28-10.7,42.1l-11.6.2c4.6-18.3,9.3-36.5,14-54.8.3-1.5.7-2.9,1.5-3.4h10.2c-.3-.8-.2-.6-.1-.4s1.3,2.5,1.9,3.8l.3.6,13.7,26.5L291.7,9.8l.6-.6,4.2-4.3h10.9Z" transform="translate(0 -4.8)" style="fill:#4db7e8"/><path d="M310,8.3a2.9,2.9,0,0,0-.2.9H238.4l.4-1.8a3.5,3.5,0,0,1,3.3-2.6h65.1A2.9,2.9,0,0,1,310,8.3Z" transform="translate(0 -4.8)" style="fill:#4db7e8"/><line x1="203.3" y1="12.2" x2="228.9" y2="12.2" style="fill:none;stroke:#4db7e8;stroke-linecap:round;stroke-linejoin:round;stroke-width:5px"/><line x1="213.5" y1="26.2" x2="225.3" y2="26.2" style="fill:none;stroke:#4db7e8;stroke-linecap:round;stroke-linejoin:round;stroke-width:5px"/><line x1="218.8" y1="40.2" x2="221.9" y2="40.2" style="fill:none;stroke:#4db7e8;stroke-linecap:round;stroke-linejoin:round;stroke-width:5px"/></g></g></svg>
                        {{-- <span class="ml-1 status small">
                            <svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg AvailableOfflineIcon-svg SVG--color-svg" style="width: 14px;height: 14px;" width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg"><g fill-rule="evenodd"><g fill-rule="nonzero"><path d="M7 14c3.83 0 7-3.177 7-7 0-3.83-3.177-7-7.007-7C3.171 0 0 3.17 0 7c0 3.823 3.177 7 7 7zm-1.475-3.054l.521-2.855H4.193c-.377 0-.508-.302-.213-.666L7.631 2.78c.261-.322.687-.137.618.261l-.528 2.855h1.86c.377 0 .507.295.212.659L6.135 11.2c-.26.33-.68.144-.61-.254z"></path></g></g></svg>
                        </span> --}}
                    </div>
                    <div class="logo-dark"> 
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 389.3 60.1"><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><g style="opacity:0.8"><path d="M38.5,61.2,36.6,48.6H16.9l-7,12.6H0L29.5,10.8h9.9l8,50.4ZM33.1,20.8V18.4H33a33.4,33.4,0,0,1-1.6,3.8L20.5,41.5H35.7l-2.4-19A7.2,7.2,0,0,1,33.1,20.8Z" transform="translate(0 -4.8)" style="fill:#fff"/><path d="M82.7,33.7a13,13,0,0,0-3.3-1.9A12.7,12.7,0,0,0,75,31a10.4,10.4,0,0,0-6.1,2,13,13,0,0,0-4.5,5.7,17.8,17.8,0,0,0-1.8,7.8c0,2.9.7,5.1,2,6.6a6.9,6.9,0,0,0,5.5,2.3,13.9,13.9,0,0,0,4.7-.9,19.3,19.3,0,0,0,4.3-2.2l-1.4,7.2a22.2,22.2,0,0,1-10,2.6c-4.2,0-7.6-1.3-10-3.9s-3.6-6.3-3.6-10.9a25.4,25.4,0,0,1,2.7-11.6A20.2,20.2,0,0,1,75.3,24.3a22.2,22.2,0,0,1,5.1.6,14.8,14.8,0,0,1,3.9,1.6Z" transform="translate(0 -4.8)" style="fill:#fff"/><path d="M118.6,34.1c0,4.3-2,7.5-6.1,9.5s-10.1,3.2-18.3,3.3V48a7,7,0,0,0,2.2,5.6,8.4,8.4,0,0,0,6.1,2.1,20.1,20.1,0,0,0,5.7-1,31.7,31.7,0,0,0,5.6-2.5l-1.4,7a24.8,24.8,0,0,1-11.8,2.9c-4.6,0-8.3-1.3-10.9-3.9s-3.9-6.3-3.9-11a25.3,25.3,0,0,1,2.7-11.5,20.6,20.6,0,0,1,7.4-8.3,18.7,18.7,0,0,1,10.5-3.1q5.7,0,9,2.7A8.6,8.6,0,0,1,118.6,34.1Zm-8.2.2a3.6,3.6,0,0,0-1.3-2.8,5.7,5.7,0,0,0-3.6-1.1,9.5,9.5,0,0,0-6.7,3.1,14.8,14.8,0,0,0-4,7.5C105.2,41,110.4,38.8,110.4,34.3Z" transform="translate(0 -4.8)" style="fill:#fff"/><path d="M130.6,61.8c-2.6,0-4.6-.6-6-1.9a7.4,7.4,0,0,1-2-5.5,45.8,45.8,0,0,1,1.3-8.5c.9-4.1,3.6-16.8,8.1-38h8.6l-8.6,40a42.9,42.9,0,0,0-.7,4.5c0,1.8,1,2.7,3.1,2.7a8.3,8.3,0,0,0,3.2-.6L136.2,61A21,21,0,0,1,130.6,61.8Z" transform="translate(0 -4.8)" style="fill:#fff"/><path d="M151.3,61.8c-2.6,0-4.6-.6-5.9-1.9a7.1,7.1,0,0,1-2.1-5.5,48.8,48.8,0,0,1,1.4-8.5c.9-4.1,3.6-16.8,8.1-38h8.5l-8.5,40a25.8,25.8,0,0,0-.7,4.5q0,2.7,3,2.7a7.9,7.9,0,0,0,3.2-.6L157,61A21.2,21.2,0,0,1,151.3,61.8Z" transform="translate(0 -4.8)" style="fill:#fff"/><path d="M196.3,34.1a10,10,0,0,1-6,9.5c-4.1,2.1-10.2,3.2-18.4,3.3V48a7.4,7.4,0,0,0,2.2,5.6,8.5,8.5,0,0,0,6.1,2.1,20.1,20.1,0,0,0,5.7-1,31.7,31.7,0,0,0,5.6-2.5l-1.4,7a24.7,24.7,0,0,1-11.7,2.9c-4.7,0-8.3-1.3-10.9-3.9s-4-6.3-4-11a25.3,25.3,0,0,1,2.7-11.5,20.8,20.8,0,0,1,7.5-8.3A18.4,18.4,0,0,1,184,24.3q5.7,0,9,2.7A8.6,8.6,0,0,1,196.3,34.1Zm-8.2.2a3.3,3.3,0,0,0-1.3-2.8,5.4,5.4,0,0,0-3.5-1.1,9.6,9.6,0,0,0-6.8,3.1,15.6,15.6,0,0,0-4,7.5C182.9,41,188.1,38.8,188.1,34.3Z" transform="translate(0 -4.8)" style="fill:#fff"/></g><path d="M339.5,64h-8.6c0-.6.1-1.7.2-3.2s.3-2.8.5-3.6h-.2a31.5,31.5,0,0,1-3.8,4.7,12.9,12.9,0,0,1-3.5,2.2,10.8,10.8,0,0,1-4.2.8,9.5,9.5,0,0,1-8-3.7c-1.9-2.4-2.8-5.7-2.8-10a25.9,25.9,0,0,1,3.1-12.4,20.1,20.1,0,0,1,8.2-8.8,24.2,24.2,0,0,1,12-2.9,67,67,0,0,1,13.5,1.7l-5,23.5a58.3,58.3,0,0,0-.9,6.1A51.3,51.3,0,0,0,339.5,64Zm-3.2-30a18.6,18.6,0,0,0-4.8-.5,12.4,12.4,0,0,0-7.1,2.1,14.5,14.5,0,0,0-4.9,6.3,22.6,22.6,0,0,0-1.9,8.9,9.1,9.1,0,0,0,1.4,5.4,4.4,4.4,0,0,0,3.9,1.9q3.9,0,6.9-3.9a26.6,26.6,0,0,0,4.4-10.5Z" transform="translate(0 -4.8)" style="fill:#3a97d4"/><path d="M358.6,64.6a8.1,8.1,0,0,1-5.9-2,7.1,7.1,0,0,1-2.1-5.5,19.8,19.8,0,0,1,.4-3.6L356.3,28h8.5L360,50.7a25.8,25.8,0,0,0-.7,4.5c0,1.8,1,2.7,3.1,2.7a8.7,8.7,0,0,0,3.2-.6l-1.4,6.5A23.6,23.6,0,0,1,358.6,64.6Zm9.5-48.8a4.5,4.5,0,0,1-1.5,3.5,5.3,5.3,0,0,1-3.7,1.4,5.7,5.7,0,0,1-3.6-1.3,4.4,4.4,0,0,1-1.4-3.3,4.4,4.4,0,0,1,1.5-3.5,5.7,5.7,0,0,1,3.8-1.4,5.6,5.6,0,0,1,3.5,1.3A4.5,4.5,0,0,1,368.1,15.8Z" transform="translate(0 -4.8)" style="fill:#3a97d4"/><path d="M379.3,64.6a8.1,8.1,0,0,1-5.9-2,6.9,6.9,0,0,1-2.1-5.4,48.8,48.8,0,0,1,1.4-8.5c.8-4.1,3.5-16.8,8-38h8.6l-8.5,40a30.4,30.4,0,0,0-.8,4.5c0,1.8,1.1,2.7,3.1,2.7a7.9,7.9,0,0,0,3.2-.6L385,63.8A21.2,21.2,0,0,1,379.3,64.6Z" transform="translate(0 -4.8)" style="fill:#3a97d4"/><path d="M307.4,4.9,310,8.1a4.3,4.3,0,0,0-.2,1.1c-.1.2-.1.4-.2.6L297.9,63.9H284.5l10.3-44c-9.6,9.8-19.1,19.7-28.7,29.6l-4.2-.6L246.7,21.7c-3.6,14-7.1,28-10.7,42.1l-11.6.2c4.6-18.3,9.3-36.5,14-54.8.3-1.5.7-2.9,1.5-3.4h10.2c-.3-.8-.2-.6-.1-.4s1.3,2.5,1.9,3.8l.3.6,13.7,26.5L291.7,9.8l.6-.6,4.2-4.3h10.9Z" transform="translate(0 -4.8)" style="fill:#3a97d4"/><path d="M310,8.3a2.9,2.9,0,0,0-.2.9H238.4l.4-1.8a3.5,3.5,0,0,1,3.3-2.6h65.1A2.9,2.9,0,0,1,310,8.3Z" transform="translate(0 -4.8)" style="fill:#3a97d4"/><line x1="203.3" y1="12.2" x2="228.9" y2="12.2" style="fill:none;stroke:#3a97d4;stroke-linecap:round;stroke-linejoin:round;stroke-width:5px"/><line x1="213.5" y1="26.2" x2="225.3" y2="26.2" style="fill:none;stroke:#3a97d4;stroke-linecap:round;stroke-linejoin:round;stroke-width:5px"/><line x1="218.8" y1="40.2" x2="221.9" y2="40.2" style="fill:none;stroke:#3a97d4;stroke-linecap:round;stroke-linejoin:round;stroke-width:5px"/></g></g></svg>
                        {{-- <span class="ml-1 status small">
                            <svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg AvailableOfflineIcon-svg SVG--color-svg" style="width: 14px;height: 14px;" width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg"><g fill-rule="evenodd"><g fill-rule="nonzero"><path d="M7 14c3.83 0 7-3.177 7-7 0-3.83-3.177-7-7.007-7C3.171 0 0 3.17 0 7c0 3.823 3.177 7 7 7zm-1.475-3.054l.521-2.855H4.193c-.377 0-.508-.302-.213-.666L7.631 2.78c.261-.322.687-.137.618.261l-.528 2.855h1.86c.377 0 .507.295.212.659L6.135 11.2c-.26.33-.68.144-.61-.254z"></path></g></g></svg>
                        </span> --}}
                    </div>
                    
                </div>
                <div class="">
                    <span class="theme-toggle">
                        <span class="circle-box">
                            <span class="icon light-icon">
                                <svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg LightModeIcon-svg SVG--color-svg" style="width: 12px;height: 12px;" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="M3.828 5.243L2.343 3.757a1 1 0 0 1 1.414-1.414l1.486 1.485a5.027 5.027 0 0 0-1.415 1.415zM7 3.1V1a1 1 0 1 1 2 0v2.1a5.023 5.023 0 0 0-2 0zm3.757.728l1.486-1.485a1 1 0 1 1 1.414 1.414l-1.485 1.486a5.027 5.027 0 0 0-1.415-1.415zM12.9 7H15a1 1 0 0 1 0 2h-2.1a5.023 5.023 0 0 0 0-2zm-.728 3.757l1.485 1.486a1 1 0 1 1-1.414 1.414l-1.486-1.485a5.027 5.027 0 0 0 1.415-1.415zM9 12.9V15a1 1 0 0 1-2 0v-2.1a5.023 5.023 0 0 0 2 0zm-3.757-.728l-1.486 1.485a1 1 0 0 1-1.414-1.414l1.485-1.486a5.027 5.027 0 0 0 1.415 1.415zM3.1 9H1a1 1 0 1 1 0-2h2.1a5.023 5.023 0 0 0 0 2zM8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" fill-rule="evenodd"></path></svg>
                            </span>
                            <span class="icon dark-icon">
                                <svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg DarkModeIcon-svg SVG--color-svg" style="width: 12px;height: 12px;" viewBox="0 0 17 16" xmlns="http://www.w3.org/2000/svg"><path d="M7.914 0a6.874 6.874 0 0 0-1.26 3.972c0 3.875 3.213 7.017 7.178 7.017.943 0 1.843-.178 2.668-.5C15.423 13.688 12.34 16 8.704 16 4.174 16 .5 12.41.5 7.982.5 3.814 3.754.389 7.914 0z" fill-rule="evenodd"></path></svg>
                            </span>
                        </span>
                        <span class="bar"></span>
                    </span>
                </div>
            </div>
            <div class=" pr-2">
                <button class="btn btn-secondary sidebar-search">
                    <div class="SVGInline SVGInline--cleaned SVG Icon Icon--search SearchIcon SVG--color SVG--color--gray200 Box-root Flex-flex">
                        <svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--search-svg SearchIcon-svg SVG--color-svg SVG--color--gray200-svg" style="width: 12px;height: 12px;" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg"><path d="M12.6 11.2c.037.028.073.059.107.093l3 3a1 1 0 1 1-1.414 1.414l-3-3a1.009 1.009 0 0 1-.093-.107 7 7 0 1 1 1.4-1.4zM7 12A5 5 0 1 0 7 2a5 5 0 0 0 0 10z" fill-rule="evenodd"></path></svg>
                    </div>
                    <span class="ml-2">Find anything</span>
                    <span class="ml-auto">/</span>
                </button>
            </div>
            <div class="">
                <ul class="main-menu">
                    <li class="current">
                        <a href="#">
                            Introduction
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Authentication
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Mail Lists
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Subscribers
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Campaigns
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Automations
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Profile
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content">
            <div class="top-menu d-flex">
                <ul class="nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="">
                            API referrence
                            <svg class="ml-1 SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--chevronDown-svg Icon--color--inherit-svg TopNavDropdown-arrow-svg" style="width: 10px;height: 10px;" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg"><path d="M13.591 5.293a1 1 0 0 1 1.416 1.416l-6.3 6.3a1 1 0 0 1-1.414 0l-6.3-6.3A1 1 0 0 1 2.41 5.293L8 10.884z" fill-rule="evenodd"></path></svg>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">
                            Docs
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">
                            Support
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">
                            Sign in →
                        </a>
                    </li>
                </ul>
            </div>
            <div class="inner-content">
                <div class="subsection">
                    <h2 class="mb-4">API Reference</h2>
                    <div class="row">
                        <div class="col-md-7 pr-5">                        
                            <p>The Stripe API is organized around <a href="http://en.wikipedia.org/wiki/Representational_State_Transfer" target="_blank" rel="noopener noreferrer">REST</a>. Our API has predictable resource-oriented URLs, accepts <a href="https://en.wikipedia.org/wiki/POST_(HTTP)#Use_for_submitting_web_forms" target="_blank" rel="noopener noreferrer">form-encoded</a> request bodies, returns <a href="http://www.json.org/" target="_blank" rel="noopener noreferrer">JSON-encoded</a> responses, and uses standard HTTP response codes, authentication, and verbs. </p>
                            <p>You can use the Stripe API in test mode, which does not affect your live data or interact with the banking networks. The API key you use to <a href="#authentication">authenticate</a> the request determines whether the request is live mode or test mode.</p>
                            <p>The Stripe API differs for every account as we release new <a href="#versioning">versions</a> and tailor functionality. <span>Log in to see docs customized to your version of the API, with your test key and data.</span></p>
                            <p>Subscribe to Stripe's <a href="https://groups.google.com/a/lists.stripe.com/group/api-announce/">API announce mailing list</a> for updates.</p>
                            <p class="mt-4"><span class="csat-widget-text">Was this section helpful?</span> <a href="#" class="ml-2 mr-2 font-weight-bold">Yes</a> <a href="#" class="font-weight-bold">No</a></p>
                        </div>
                        <div class="col-md-5">
                            <h6>Just getting started?</h6>
                            <p class="">Check out our <a href="/docs/development" target="_blank" rel="noopener noreferrer" class="docs-link">development quickstart</a> guide.</p>

                            <h6 class="mt-4">Not a developer?</h6>
                            <p class="">Use apps from <a href="/works-with/type/platform" target="_blank" rel="noopener noreferrer" class="docs-link">our partners</a> to get started with Stripe and to do more with your Stripe account—no code required.</p>

                            <div class="code-box">
                                <div class="box-header">
                                    <div class="box-title">Base URL</div>
                                </div>
                                <pre class="IntroSection-pre"><code>http://acelle.wsl/frontend/docs/api/v1</code></pre>
                            </div>

                            <div class="SelectClientLibrary">
                                <div class="SelectClientLibrary-topbar">
                                    <div class="SelectClientLibrary-title">Client libraries</div>
                                </div>
                                <div class="SelectClientLibrary-langs">
                                    <a class="SelectClientLibrary-lang SelectClientLibrary-lang--active" href="/docs/api/authentication?lang=php"><div class="SVGInline SVG LangIcon Box-root Flex-flex"><svg class="SVGInline-svg SVG-svg LangIcon-svg" style="width: 24px;height: 24px;" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g fill="#6181B6" fill-rule="evenodd"><path d="M9.762 14.509h-1.18l-.643 3.31h1.047c.695 0 1.213-.132 1.553-.393.34-.262.569-.698.687-1.311.115-.588.063-1.002-.155-1.244-.218-.241-.653-.362-1.308-.362z"></path><path d="M16 8.86c-8.284 0-15 3.533-15 7.89s6.716 7.891 15 7.891c8.284 0 15-3.533 15-7.891s-6.716-7.89-15-7.89zm-4.075 9.314a3.034 3.034 0 0 1-1.146.688c-.42.135-.956.205-1.606.205H7.696l-.408 2.102H5.564l1.538-7.908h3.312c.996 0 1.723.261 2.18.785.458.523.595 1.253.412 2.19-.07.371-.198.729-.38 1.059a3.57 3.57 0 0 1-.702.879zm5.03.893l.679-3.498c.079-.398.049-.67-.085-.814-.134-.145-.42-.218-.859-.218h-1.365l-.88 4.532h-1.71l1.538-7.909h1.708l-.408 2.103h1.522c.959 0 1.619.167 1.983.5s.472.876.328 1.625l-.715 3.68h-1.736zm9.496-2.83a3.477 3.477 0 0 1-.381 1.058 3.57 3.57 0 0 1-.701.879 3.05 3.05 0 0 1-1.147.688c-.42.135-.956.205-1.607.205H21.14l-.409 2.103H19.01l1.537-7.908h3.312c.996 0 1.722.262 2.18.785.457.522.596 1.252.413 2.19z" fill-rule="nonzero"></path><path d="M23.207 14.509H22.03l-.645 3.31h1.047c.696 0 1.214-.132 1.553-.393.34-.262.568-.698.688-1.311.115-.588.062-1.002-.156-1.244-.217-.241-.655-.362-1.309-.362z"></path></g></svg></div>
                                        <div class="SelectClientLibrary-lang-name">PHP</div></a>
                                    <a class="SelectClientLibrary-lang" href="/docs/api/authentication?lang=ruby">
                                        <div class="SVGInline SVG LangIcon Box-root Flex-flex">
                                            <svg class="SVGInline-svg SVG-svg LangIcon-svg" style="width: 24px;height: 24px;" viewBox="4 4 28 28" xmlns="http://www.w3.org/2000/svg"><path d="M23.476 5.076c2.78.481 3.569 2.382 3.51 4.373L27 9.42l-1.251 16.398-16.266 1.114h.014c-1.35-.057-4.36-.18-4.497-4.388l1.508-2.75 2.584 6.037.461 1.075 2.571-8.382-.027.006.014-.028 8.484 2.71-1.28-4.978-.907-3.575 8.085-.522-.564-.467-5.804-4.732 3.354-1.871-.003.01zM9.703 9.65c3.264-3.238 7.477-5.152 9.095-3.52 1.615 1.63-.097 5.597-3.367 8.833-3.266 3.238-7.428 5.256-9.042 3.628-1.62-1.63.041-5.7 3.31-8.938l.004-.003z" fill="#D91505"></path></svg>
                                        </div>
                                        <div class="SelectClientLibrary-lang-name">Ruby</div></a><a class="SelectClientLibrary-lang" href="/docs/api/authentication?lang=python"><div class="SVGInline SVG LangIcon Box-root Flex-flex"><svg class="SVGInline-svg SVG-svg LangIcon-svg" style="width: 24px;height: 24px;" viewBox="0 0 256 255" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid"><path d="M126.916.072c-64.832 0-60.784 28.115-60.784 28.115l.072 29.128h61.868v8.745H41.631S.145 61.355.145 126.77c0 65.417 36.21 63.097 36.21 63.097h21.61v-30.356s-1.165-36.21 35.632-36.21h61.362s34.475.557 34.475-33.319V33.97S194.67.072 126.916.072zM92.802 19.66a11.12 11.12 0 0 1 11.13 11.13 11.12 11.12 0 0 1-11.13 11.13 11.12 11.12 0 0 1-11.13-11.13 11.12 11.12 0 0 1 11.13-11.13z" fill="#3372a7"></path><path d="M128.757 254.126c64.832 0 60.784-28.115 60.784-28.115l-.072-29.127H127.6v-8.745h86.441s41.486 4.705 41.486-60.712c0-65.416-36.21-63.096-36.21-63.096h-21.61v30.355s1.165 36.21-35.632 36.21h-61.362s-34.475-.557-34.475 33.32v56.013s-5.235 33.897 62.518 33.897zm34.114-19.586a11.12 11.12 0 0 1-11.13-11.13 11.12 11.12 0 0 1 11.13-11.131 11.12 11.12 0 0 1 11.13 11.13 11.12 11.12 0 0 1-11.13 11.13z" fill="#ffd235"></path></svg></div>
                                        <div class="SelectClientLibrary-lang-name">Python</div></a><a class="SelectClientLibrary-lang" href="/docs/api/authentication?lang=java"><div class="SVGInline SVG LangIcon Box-root Flex-flex"><svg class="SVGInline-svg SVG-svg LangIcon-svg" style="width: 24px;height: 24px;" viewBox="0 0 256 346" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid"><path d="M82.55 267.47s-13.2 7.68 9.4 10.28c27.37 3.12 41.35 2.67 71.51-3.04 0 0 7.93 4.97 19 9.28-67.6 28.98-153.01-1.68-99.9-16.52m-8.26-37.81s-14.81 10.96 7.8 13.3c29.23 3.01 52.32 3.26 92.27-4.44 0 0 5.53 5.6 14.22 8.67-81.75 23.9-172.8 1.89-114.3-17.53" fill="#5382A1"></path><path d="M143.94 165.51c16.66 19.19-4.38 36.45-4.38 36.45s42.3-21.84 22.88-49.19c-18.15-25.5-32.06-38.17 43.27-81.86 0 0-118.24 29.53-61.77 94.6" fill="#E76F00"></path><path d="M233.36 295.44s9.77 8.05-10.75 14.28c-39.03 11.82-162.44 15.39-196.72.47-12.32-5.36 10.79-12.8 18.06-14.37 7.58-1.64 11.91-1.33 11.91-1.33-13.7-9.66-88.58 18.95-38.03 27.15 137.85 22.35 251.3-10.07 215.53-26.2M88.9 190.48s-62.77 14.9-22.23 20.32c17.12 2.3 51.25 1.78 83.03-.89 25.98-2.19 52.07-6.85 52.07-6.85s-9.16 3.93-15.8 8.45c-63.74 16.77-186.88 8.97-151.43-8.18 29.98-14.5 54.36-12.85 54.36-12.85m112.6 62.94c64.8-33.67 34.84-66.03 13.93-61.67-5.12 1.07-7.4 2-7.4 2s1.9-2.99 5.53-4.28c41.37-14.54 73.19 42.9-13.36 65.65 0 0 1-.9 1.3-1.7" fill="#5382A1"></path><path d="M162.44.37s35.89 35.9-34.04 91.1c-56.07 44.28-12.78 69.53-.02 98.38-32.73-29.53-56.75-55.53-40.64-79.72C111.4 74.6 176.92 57.39 162.44.37" fill="#E76F00"></path><path d="M95.27 344.67c62.2 3.98 157.71-2.21 159.97-31.64 0 0-4.35 11.15-51.4 20.01-53.09 10-118.57 8.83-157.4 2.42 0 0 7.95 6.58 48.83 9.2" fill="#5382A1"></path></svg></div>
                                        <div class="SelectClientLibrary-lang-name">Java</div></a><a class="SelectClientLibrary-lang" href="/docs/api/authentication?lang=node"><div class="SVGInline SVG LangIcon Box-root Flex-flex"><svg class="SVGInline-svg SVG-svg LangIcon-svg" style="width: 24px;height: 24px;" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path d="M15.516 28.952a2.09 2.09 0 0 1-1.002-.263l-3.17-1.883c-.478-.262-.24-.358-.096-.405.644-.215.763-.263 1.43-.644.072-.048.167-.024.239.024l2.432 1.454c.095.048.214.048.286 0l9.513-5.507c.095-.048.143-.143.143-.263v-10.99c0-.12-.048-.215-.143-.263L15.635 4.73c-.096-.048-.215-.048-.286 0l-9.513 5.483c-.096.048-.143.167-.143.262v10.991c0 .096.047.215.143.263l2.599 1.502c1.406.715 2.288-.12 2.288-.954V11.428a.29.29 0 0 1 .286-.286h1.216a.29.29 0 0 1 .287.286v10.848c0 1.884-1.026 2.98-2.814 2.98-.548 0-.977 0-2.193-.596L5 23.23A2.012 2.012 0 0 1 4 21.49V10.497c0-.715.381-1.383 1.001-1.74l9.513-5.508a2.128 2.128 0 0 1 2.003 0l9.513 5.508a2.012 2.012 0 0 1 1.001 1.74V21.49c0 .716-.381 1.383-1.001 1.74l-9.513 5.508a2.44 2.44 0 0 1-1.001.215zm2.932-7.558c-4.172 0-5.03-1.907-5.03-3.529a.29.29 0 0 1 .286-.286h1.24c.142 0 .262.096.262.239.19 1.263.739 1.883 3.266 1.883 2.003 0 2.861-.453 2.861-1.526 0-.62-.238-1.073-3.362-1.383-2.598-.262-4.22-.834-4.22-2.908 0-1.931 1.622-3.076 4.34-3.076 3.051 0 4.553 1.05 4.744 3.338a.385.385 0 0 1-.072.215c-.047.047-.119.095-.19.095h-1.24a.28.28 0 0 1-.262-.215c-.286-1.31-1.025-1.74-2.98-1.74-2.194 0-2.456.763-2.456 1.335 0 .691.31.906 3.266 1.288 2.933.381 4.315.93 4.315 2.98-.023 2.098-1.74 3.29-4.768 3.29z" fill="#89D42C"></path></svg></div>
                                        <div class="SelectClientLibrary-lang-name">Node.js</div></a><a class="SelectClientLibrary-lang" href="/docs/api/authentication?lang=go"><div class="SVGInline SVG LangIcon Box-root Flex-flex"><svg class="SVGInline-svg SVG-svg LangIcon-svg" style="width: 24px;height: 24px;" viewBox="2 2 30 30" xmlns="http://www.w3.org/2000/svg"><g fill="#00ACD7" fill-rule="evenodd"><path d="M3.35 13.5c-.06 0-.07-.04-.05-.08l.3-.4c.04-.03.11-.06.17-.06h5.17c.06 0 .07.04.05.08l-.25.38c-.03.04-.1.09-.15.09l-5.24-.02zm-2.19 1.33c-.06 0-.07-.03-.04-.08l.3-.39c.03-.04.1-.07.16-.07h6.6c.07 0 .1.04.08.09l-.12.34c-.01.06-.07.1-.13.1H1.16zm3.51 1.33c-.06 0-.08-.04-.05-.09l.2-.36c.04-.04.1-.09.15-.09h2.9c.06 0 .09.05.09.1l-.03.35c0 .06-.06.1-.1.1l-3.16-.01zm15.04-2.93l-2.43.64c-.22.06-.24.07-.42-.15-.22-.24-.38-.4-.69-.55a2.52 2.52 0 0 0-2.62.22 3.08 3.08 0 0 0-1.48 2.75 2.27 2.27 0 0 0 1.96 2.28c.98.13 1.81-.22 2.46-.96l.4-.53h-2.8c-.3 0-.38-.2-.28-.44.19-.45.54-1.2.74-1.58a.4.4 0 0 1 .36-.23h5.28c-.03.4-.03.78-.09 1.18-.16 1.04-.55 2-1.19 2.84a6.04 6.04 0 0 1-4.13 2.46 5.13 5.13 0 0 1-3.9-.96A4.55 4.55 0 0 1 9.04 17c-.18-1.58.28-3 1.24-4.25a6.43 6.43 0 0 1 4.05-2.5 5 5 0 0 1 3.84.7c.77.5 1.32 1.2 1.69 2.05.08.13.02.2-.15.24z"></path><path d="M24.5 21.25a5.44 5.44 0 0 1-3.53-1.28 4.55 4.55 0 0 1-1.56-2.8 5.53 5.53 0 0 1 1.17-4.37 6.08 6.08 0 0 1 4.06-2.42 5.38 5.38 0 0 1 4.13.74 4.51 4.51 0 0 1 2.04 3.23 5.6 5.6 0 0 1-1.67 4.91 6.64 6.64 0 0 1-3.47 1.86c-.4.07-.79.08-1.16.13zm3.46-5.86c-.02-.19-.02-.33-.05-.48A2.39 2.39 0 0 0 24.96 13a3.17 3.17 0 0 0-2.54 2.52 2.39 2.39 0 0 0 1.33 2.74c.8.34 1.6.3 2.37-.1a3.17 3.17 0 0 0 1.84-2.76z" fill-rule="nonzero"></path></g></svg></div>
                                        <div class="SelectClientLibrary-lang-name">Go</div></a><a class="SelectClientLibrary-lang" href="/docs/api/authentication?lang=dotnet"><div class="SVGInline SVG LangIcon Box-root Flex-flex"><svg class="SVGInline-svg SVG-svg LangIcon-svg" style="width: 24px;height: 24px;" viewBox="2 2 28 28" xmlns="http://www.w3.org/2000/svg"><g fill="#1384C8" fill-rule="evenodd"><path d="M11.68 13.26c1 3.07 1.38 8.54 4.31 8.54.23 0 .45-.03.68-.07-2.67-.62-2.98-6.03-4.6-8.83l-.39.36"></path><path d="M12.06 12.9c1.63 2.8 1.94 8.21 4.6 8.83.22-.04.43-.1.64-.17-2.4-1.17-3.06-6.42-4.9-8.95l-.34.29"></path><path d="M14.4 11.23a5.17 5.17 0 0 0-2.48.82c.17.17.33.35.48.56.62-.51 1.23-.9 1.84-1.12.23-.09.46-.15.69-.2a2.12 2.12 0 0 0-.53-.06m4.76 9.25c.25-.2.5-.4.74-.64-1.02-3.05-1.38-8.6-4.34-8.6-.2 0-.42.02-.63.06 2.69.67 3.03 6.52 4.23 9.18"></path><path d="M14.93 11.3a2.12 2.12 0 0 0-.53-.07h1.17c-.22 0-.43.03-.64.07m4.18 9.83a4.37 4.37 0 0 1-.33-.36c-.5.35-1 .62-1.48.8a2.28 2.28 0 0 0 1.02.23c.55 0 .99-.07 1.36-.25-.2-.1-.4-.25-.57-.42m-4.87-9.64c2.4 1.26 2.62 6.96 4.54 9.28l.38-.29c-1.2-2.66-1.54-8.51-4.23-9.18-.23.04-.46.1-.69.19"></path><path d="M12.4 12.6c1.84 2.54 2.5 7.79 4.9 8.96.49-.17.98-.44 1.48-.79-1.92-2.32-2.13-8.02-4.54-9.28-.61.23-1.22.6-1.84 1.12m-1.9.58c-.3.65-.59 1.51-.94 2.64.7-1 1.42-1.87 2.12-2.57-.1-.3-.2-.57-.31-.82-.3.22-.58.47-.87.75"></path><path d="M11.62 12.26l-.25.18c.1.25.21.52.3.82l.4-.36a5.07 5.07 0 0 0-.45-.64"></path><path d="M11.93 12.05l-.3.2c.15.2.3.42.43.65l.34-.3c-.15-.2-.3-.38-.47-.55M28.35 11c-1.36 5.25-4.2 9.47-6.59 10.54l-.13.05h-.02l-.04.02h-.01l-.06.03h-.03l-.03.02h-.02l-.03.02-.05.01h-.02l-.04.02h-.02l-.04.01-.04.01c.1.04.22.06.34.06 2.26 0 4.54-4.05 8.31-10.79h-1.48zm-19.29.45h.01l.04-.02h.01l.01-.01.04-.01.09-.04h.01l.04-.01h.02l.03-.02h.02l.12-.03h.02l.04-.01h.01l.04-.02.08-.01h.07l.04-.01h.02l.08-.02h-.24c-2.55 0-6.06 4.72-7.64 10.84h.3c.51-.9.96-1.76 1.38-2.56 1.1-4.33 3.36-7.29 5.36-8.07m1.44 1.74c.29-.28.58-.53.87-.75a4.1 4.1 0 0 0-.21-.4 4.9 4.9 0 0 0-.66 1.15"></path><path d="M10.7 11.48c.17.14.32.34.46.57l.13-.15a2.55 2.55 0 0 0-.58-.42M3.7 19.52c2.32-4.47 3.42-7.3 5.36-8.07-2 .78-4.25 3.74-5.36 8.07"></path><path d="M11.3 11.9l-.14.14.2.4.26-.18c-.1-.13-.21-.25-.33-.36M4.75 22.06h-.08l-.1.01c2.35-.06 3.42-1.24 3.96-2.95.4-1.3.73-2.38 1.03-3.3a46.74 46.74 0 0 0-2.97 4.9c-.48.88-1.21 1.26-1.84 1.34"></path><path d="M4.75 22.06A2.43 2.43 0 0 0 6.6 20.7c1-1.85 1.98-3.5 2.97-4.88.35-1.13.65-1.99.94-2.64-1.96 1.86-3.93 4.97-5.75 8.87M3.7 19.52c-.42.8-.87 1.66-1.38 2.56h.89c.12-.9.28-1.75.49-2.56"></path><path d="M9.82 11.25H9.8l-.04.01h-.02l-.03.01h-.02l-.07.02H9.6a.3.3 0 0 1-.04 0l-.02.01h-.03l-.02.01-.12.03h-.02l-.03.02H9.3l-.04.02h-.01l-.09.03-.04.01-.01.01-.04.01-.01.01c-1.95.77-3.05 3.6-5.37 8.07-.2.81-.37 1.66-.49 2.56h1.47l.04-.01h.05c1.81-3.9 3.78-7.01 5.74-8.88.22-.48.43-.86.66-1.14a2.17 2.17 0 0 0-.45-.56l-.03-.02-.03-.01-.03-.02h-.03l-.02-.02-.05-.02h-.03a.73.73 0 0 1-.03-.02l-.03-.01-.05-.02-.06-.02h-.02l-.05-.02h-.01a1.84 1.84 0 0 0-.13-.03h-.02l-.05-.01h-.01l-.07-.01h-.14m13.21 2.64c-.44 1.44-.8 2.62-1.12 3.6a38.91 38.91 0 0 0 3.58-6.27c-1.34.43-2.05 1.39-2.46 2.68m-1.08 7.54l-.19.09c2.39-1.07 5.23-5.29 6.6-10.54h-.28c-3.13 5.6-4.14 9.33-6.13 10.45m-1.56-.47c.52-.64.94-1.71 1.52-3.49a18.1 18.1 0 0 1-2 2.34l-.01.01c.15.44.3.83.49 1.14M20.39 20.98a2.13 2.13 0 0 1-.71.57 2.01 2.01 0 0 0 .85.24h.41l.04-.02h.08l.12-.03c-.31-.11-.57-.38-.8-.76M16 21.8a3.57 3.57 0 0 0 1.3-.24 2.29 2.29 0 0 0 1.02.24H16z"></path><path d="M18.32 21.8c.55 0 .99-.07 1.36-.25a2.01 2.01 0 0 0 .85.24h.13-2.34zm2.34 0h.15l.04-.01h.1l.05-.02h.06l.12-.03c.1.04.22.06.34.06h-.86zm-.76-1.96a10.73 10.73 0 0 1-1.12.93c.1.13.22.25.33.36.18.17.37.31.57.42l.14-.07c.2-.12.4-.29.57-.5-.18-.32-.34-.7-.49-1.14M27.2 11h-1.38l-.23.01-.1.22a38.91 38.91 0 0 1-3.58 6.26c-.58 1.77-1 2.85-1.52 3.48.22.38.48.65.79.76h.04l.04-.02h.02l.04-.01h.02l.05-.02.03-.01.02-.01.03-.01.03-.01.06-.02h.01l.04-.02h.02l.12-.06h.01l.19-.1c1.99-1.1 3-4.85 6.13-10.44h-.88zm-17.3.25h.05l.08.01.06.02h.02l.13.03.06.02h.01a.93.93 0 0 1 .07.02l.05.02h.02l.04.02.02.01.05.02.03.01.03.02h.03l.03.02c.22.11.42.26.61.43a2 2 0 0 1 .22-.2 2.4 2.4 0 0 0-1.61-.45"></path><path d="M11.3 11.9c.1.1.22.23.32.36.1-.08.2-.14.3-.2a3.2 3.2 0 0 0-.41-.36c-.08.06-.15.12-.22.2m-1.39-.65l.19-.01c.54 0 1 .17 1.42.46.44-.34.96-.47 1.7-.47H9.66l.24.02"></path><path d="M13.2 11.23c-.73 0-1.25.13-1.7.47.15.1.3.22.43.35.6-.38 1.2-.64 1.8-.75.23-.04.45-.07.67-.07h-1.2zm8.7 6.27c.32-.98.68-2.16 1.13-3.6.4-1.28 1.12-2.25 2.46-2.67l.1-.22c-2.18.14-3.2 1.25-3.72 2.9-.9 2.87-1.44 4.74-1.97 5.92a17.5 17.5 0 0 0 2-2.34"></path></g></svg></div>
                                        <div class="SelectClientLibrary-lang-name">.NET</div></a></div><div class="SelectClientLibrary-install"><div class="InstallClientLibrary"><div class="InstallClientLibrary-code include-prompt"><div class="CodeBlock" style="min-height: 18px;"><div class="CodeBlock-scroll">
                                            <pre class="CodeBlock-pre  language-bash"><code class="  language-bash">composer require acelle/sdk-php</code></pre>
                                        </div></div><div class="InstallClientLibrary-code-fade"></div></div><div class="InstallClientLibrary-links"><a href="https://github.com/stripe/stripe-php" target="_blank" rel="noopener noreferrer"><div class="SVGInline SVGInline--cleaned SVG GithubIcon SVG--color SVG--color--blue500 Box-root Flex-flex"><svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg GithubIcon-svg SVG--color-svg SVG--color--blue500-svg" style="width: 16px;height: 16px;" id="Layer_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36"><path fill-rule="evenodd" clip-rule="evenodd" d="M18 1.4C9 1.4 1.7 8.7 1.7 17.7c0 7.2 4.7 13.3 11.1 15.5.8.1 1.1-.4 1.1-.8v-2.8c-4.5 1-5.5-2.2-5.5-2.2-.7-1.9-1.8-2.4-1.8-2.4-1.5-1 .1-1 .1-1 1.6.1 2.5 1.7 2.5 1.7 1.5 2.5 3.8 1.8 4.7 1.4.1-1.1.6-1.8 1-2.2-3.6-.4-7.4-1.8-7.4-8.1 0-1.8.6-3.2 1.7-4.4-.2-.4-.7-2.1.2-4.3 0 0 1.4-.4 4.5 1.7 1.3-.4 2.7-.5 4.1-.5 1.4 0 2.8.2 4.1.5 3.1-2.1 4.5-1.7 4.5-1.7.9 2.2.3 3.9.2 4.3 1 1.1 1.7 2.6 1.7 4.4 0 6.3-3.8 7.6-7.4 8 .6.5 1.1 1.5 1.1 3v4.5c0 .4.3.9 1.1.8 6.5-2.2 11.1-8.3 11.1-15.5C34.3 8.7 27 1.4 18 1.4z"></path></svg></div> stripe-php</a><div class="Box-root Flex-flex"><div class="Box-root Flex-flex"><button class="ClickToCopy"><div class="SVGInline SVGInline--cleaned SVG Icon Icon--clipboard SVG--color SVG--color--blue200 Box-root Flex-flex"><svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--clipboard-svg SVG--color-svg SVG--color--blue200-svg" style="width: 16px;height: 16px;" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg"><path d="M7 5h2a3 3 0 0 0 3-3 2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2 3 3 0 0 0 3 3zM6 2a2 2 0 1 1 4 0 1 1 0 0 1-1 1H7a1 1 0 0 1-1-1z" fill-rule="evenodd"></path></svg></div></button></div></div></div></div></div></div>
                        
                        
                        </div>
                    </div>
                </div>

                <div class="subsection">
                    <h2 class="mb-4">Authentication</h2>
                    <div class="row">
                        <div class="col-md-7 pr-5">                        
                            <p>The Stripe API is organized around <a href="http://en.wikipedia.org/wiki/Representational_State_Transfer" target="_blank" rel="noopener noreferrer">REST</a>. Our API has predictable resource-oriented URLs, accepts <a href="https://en.wikipedia.org/wiki/POST_(HTTP)#Use_for_submitting_web_forms" target="_blank" rel="noopener noreferrer">form-encoded</a> request bodies, returns <a href="http://www.json.org/" target="_blank" rel="noopener noreferrer">JSON-encoded</a> responses, and uses standard HTTP response codes, authentication, and verbs. </p>
                            <p>You can use the Stripe API in test mode, which does not affect your live data or interact with the banking networks. The API key you use to <a href="#authentication">authenticate</a> the request determines whether the request is live mode or test mode.</p>
                            <p>The Stripe API differs for every account as we release new <a href="#versioning">versions</a> and tailor functionality. <span>Log in to see docs customized to your version of the API, with your test key and data.</span></p>
                            <p>Subscribe to Stripe's <a href="https://groups.google.com/a/lists.stripe.com/group/api-announce/">API announce mailing list</a> for updates.</p>
                            <p class="mt-4"><span class="csat-widget-text">Was this section helpful?</span> <a href="#" class="ml-2 mr-2 font-weight-bold">Yes</a> <a href="#" class="font-weight-bold">No</a></p>
                        </div>
                        <div class="col-md-5">                        
                            <div class="code-box">
                                <div class="box-header">
                                    <div class="box-title">Per-request account</div>
                                </div>
                                <pre class="IntroSection-pre"><code>https://api.stripe.com</code></pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.theme-toggle').on('click', function() {
            body = $(this).closest('body');

            if (body.hasClass('dark-theme')) {
                body.removeClass('dark-theme');
            } else {
                body.addClass('dark-theme');
            }
        });
    </script>
@endsection