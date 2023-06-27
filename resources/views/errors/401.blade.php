@extends('errors::minimal')

@section('title', __('content.Unauthorized'))
@section('code', '401')
@section('message', __('content.Your authorization failed'))
