const path = require('path');
const webpack = require("webpack");

module.exports = {
	entry: {
		filelist: [
			path.join(__dirname, 'src', 'filelist.ts'),
		],
		retentionAssistant: [
			path.join(__dirname, 'src', 'retentionAssistant.ts'),
		],
		settings: [
			path.join(__dirname, 'src', 'settings.ts'),
		],
	},
	output: {
		path: path.resolve(__dirname, './js'),
		publicPath: '/js/',
		filename: '[name].js',
		chunkFilename: 'chunks/[name]-[hash].js',
	},
	module: {
		rules: [
			{
				test: /\.ts$/,
				use: ['ts-loader'],
			},
			{
				test: /\.css$/,
				use: ['style-loader', 'css-loader'],
			},
			{
				test: /\.scss$/,
				use: ['style-loader', 'css-loader', 'sass-loader'],
			},
			{
				test: /\.(png|jpg|gif|svg)$/,
				loader: 'url-loader',
				options: {
					name: '[name].[ext]?[hash]',
					limit: 8192,
				},
			},
		],
	},
	plugins: [
		new webpack.ProvidePlugin({
			$: 'jquery',
			jQuery: 'jquery'
		}),
	],
	resolve: {
		extensions: ['*', '.ts', '.js', '.scss'],
		symlinks: false,
	},
}
