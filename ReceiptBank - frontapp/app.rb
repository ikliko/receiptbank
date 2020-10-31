require 'sinatra'
require 'json'
require 'rest-client'

set :public_folder, 'public'

get '/' do
  redirect '/fibonacci'
end

get '/fibonacci' do
  table = nil # GET http://backapp/fibonacci?n=* (body)
  response = nil
  size = params[:n]

  begin
    table = JSON.parse(RestClient.get 'http://localhost:8000/api/fibonacci', {:params => {:n => size}}) 
  rescue RestClient::ExceptionWithResponse => err
    response = {
      type: 'error',
      message: JSON.parse(err.response.body)['message']
    }
  end

  erb :fibonacci, locals: {size: size, table: table, saved: false, response: response}, layout: :application
end

post '/fibonacci' do
  table = nil   # POST http://backapp/fibonacci (body)
  saved = false # POST http://backapp/fibonacci (HTTP stauts == 200)
  response = nil
  size = params[:n]

  begin
    table = JSON.parse(RestClient.post 'http://localhost:8000/api/fibonacci', {:n => size}, {content_disposition: 'form-data', accept: :json}) 
    saved = true
  rescue RestClient::ExceptionWithResponse => err
    response = {
      type: 'error',
      message: JSON.parse(err.response.body)['message']
    }
  end

  if saved
    response = {
      type: 'success',
      message: 'Table has been saved successfully!'
    }
  end

  erb :fibonacci, locals: {size: size, table: table, saved: saved, response: response}, layout: :application
end
