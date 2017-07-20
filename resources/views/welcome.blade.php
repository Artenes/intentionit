<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<div class="container">

    <div class="content" id="app">

        <div class="header">

            <h1 class="title">{{ config('app.name') }}</h1>

            <p class="subtitle">@lang('strings.the_intentions_of_the_world')</p>

            <input id="input-search" type="text" placeholder="@lang('strings.index_search_placeholder')" @keyup="type">

        </div>

        <template v-for="result in results">
            <div class="results">
                <div class="result">
                    <a :href="result.user.profile"><img :src="result.user.picture" class="profile"></a>
                    <p><a :href="result.user.profile">@{{ result.user.name }}</a> @lang('strings.wants_to') <strong>@{{ result.intent.title }}</strong></p>
                    <img :src="result.intent.image" class="image">
                    <p>@{{ result.intent.description }}</p>
                    <button type="button" class="button-help">@lang('strings.i_intend_to_help')</button>
                </div>
            </div>
        </template>

        <p v-if="results != null && results.length == 0" id="no-results">@lang('strings.no_results_found')</p>

    </div>

</div>

<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
