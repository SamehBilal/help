@extends('errors::minimal')

@section('title', __('content.Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'content.You tried to access a page you did not have prior authorization for'))
