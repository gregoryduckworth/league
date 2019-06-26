pipeline {
  agent any

  stages {
    stage('Build') {
      steps {
          sh 'cp .env.example .env'
          sh 'docker-compose up --build'
      }
    }
    stage('Setup') {
      steps {
        sh 'docker-compose exec league composer install'
        sh 'docker-compose exec league npm install'
        sh 'docker-compose exec league php artisan key:generate'
        sh 'docker-compose exec league php artisan migrate:fresh'
      }
    }
  }
}