pipeline {
  environment {
    PATH = "$PATH:/usr/bin/docker-compose"
  }
  
  agent any
  
  stages {
    stage('Build') {
        environment {
            DB_PORT = 3306
            DB_DATABASE = 'project-semester-6'
            DB_HOST = '0.0.0.0'
            DB_PASSWORD = ''
            DB_USERNAME = 'root'
        }
      steps {
        sh 'php --version'
        sh 'cp .env.example .env'
        sh 'cp composer.json composer.phar'
        sh 'php composer.phar install'
        sh 'echo DB_HOST=${DB_HOST} >> .env'
        sh 'echo DB_DATABASE=${DB_DATABASE} >> .env'
        sh 'echo DB_PORT=${DB_PORT} >> .env'
        sh 'echo DB_PASSWORD=${DB_PASSWORD} >> .env'
        sh 'echo DB_USERNAME=${DB_USERNAME} >> .env'
        sh 'php artisan key:generate'
        sh 'php artisan migrate'
      }
    }
    
    stage('Test') {
      steps {
        sh 'php artisan test'
      }
    }
    
    stage('Deploy') {
      steps {
        sh 'echo build succes'
      }
    }
  }
}
