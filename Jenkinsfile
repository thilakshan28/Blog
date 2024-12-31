pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                git branch: 'main', url: 'https://github.com/your-repo/laravel-app.git'
            }
        }

        stage('Build Docker Image') {
            steps {
                script {
                    docker.build('laravel-app')
                }
            }
        }

        stage('Run Tests') {
            steps {
                sh 'docker-compose exec app php artisan test'
            }
        }

        stage('Deploy') {
            steps {
                sh '''
                docker-compose down
                docker-compose up -d --build
                '''
            }
        }
    }

    post {
        success {
            echo 'Deployment Successful!'
        }
        failure {
            echo 'Build Failed!'
        }
    }
}
