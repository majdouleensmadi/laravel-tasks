<!DOCTYPE html>
<html>
<head>
    <title>Actors and Movies</title>
    <style>
        /* Add your styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #111;
            color: #fff;
            padding: 20px;
        }
        
        h1 {
            text-align: center;
            margin-bottom: 20px;
            position: relative;
            font-size: 28px;
            font-weight: bold;
            color: #e50914;
        }
        
        h1::before {
            content: attr(data-selected-option);
            position: absolute;
            top: -30px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #e50914;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            opacity: 0.8;
        }
        
        form {
            margin-bottom: 20px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            color: #fff;
            margin-bottom: 20px;
        }
        
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        .dropdown {
            display: inline-block;
            margin-right: 10px;
        }
        
        .dropdown select {
            padding: 8px;
            font-size: 14px;
            color: #000;
            background-color: #f5f5f5;
            border: none;
        }
        
        button[type="submit"] {
            padding: 8px 16px;
            font-size: 14px;
            background-color: #e50914;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        
        .section {
            margin-bottom: 40px;
            
        }
        
        .section-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        .table-container {
            overflow-x: auto;
        }
        
        .table-container table {
            width: auto;
            border-collapse: separate;
            border-spacing: 0;
        }
        
        .table-container th,
        .table-container td {
            padding: 12px;
            vertical-align: middle;
        }
        
        .table-container th {
            background-color: #e50914;
            color: #fff;
            text-align: left;
            font-weight: bold;
        }
        
        .table-container td {
            background-color: #333;
            border-bottom: none;
        }
        
        .table-container tbody tr:nth-child(odd) td {
            background-color: #222;
        }
        
        .table-container td:first-child {
            border-radius: 4px 0 0 4px;
        }
        
        .table-container td:last-child {
            border-radius: 0 4px 4px 0;
        }
        
        .table-container::-webkit-scrollbar {
            width: 8px;
        }
        
        .table-container::-webkit-scrollbar-track {
            background-color: #333;
        }
        
        .table-container::-webkit-scrollbar-thumb {
            background-color: #888;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div>
        <h1>Actors and Movies</h1>
        
        <div class="section">
            <div class="section-title">Search Actor  by Actors  :</div>
            <form action="{{ route('actormovie.index') }}" method="GET">
                <div class="dropdown">
                    <label for="movie_name">Movie Name:</label>
                    <select name="movie_name" id="movie_name">
                        <option value="">Movies</option>
                        @foreach($movies as $movie)
                            <option value="{{ $movie->name }}">{{ $movie->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit">Search Movies</button>
            </form>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th colspan="2">Movie Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($actors as $actor)
                            <tr>
                                <td rowspan="{{ count($actor->movies) + 1 }}">{{ $actor->name }}</td>
                            </tr>
                            @foreach($actor->movies as $movie)
                                <tr>
                                    <td>{{ $movie->name }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="section">
            <div class="section-title">Search Movies by Actor  :</div>
            <form action="{{ route('actormovie.index') }}" method="GET">
                <div class="dropdown">
                    <label for="actor_name">Actors Name:</label>
                    <select name="actor_name" id="actor_name">
                        <option value="">Actors</option>
                        @foreach($actors as $actor)
                            <option value="{{ $actor->name }}">{{ $actor->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit">Search Actors</button>
            </form>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th colspan="2">Move Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($movies as $movie)
                            <tr>
                                <td rowspan="{{ count($movie->actors) + 1 }}">{{ $movie->name }}</td>
                            </tr>
                            @foreach($movie->actors as $actor)
                                <tr>
                                    <td>{{ $actor->name }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
