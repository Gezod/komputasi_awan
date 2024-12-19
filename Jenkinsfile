pipeline {
    agent any
    stages {
        stage('Git checkout') {
            steps {
                checkout([$class: 'GitSCM', branches: [[name: '*/main']],
                          userRemoteConfigs: [[url: 'https://github.com/Gezod/komputasi_awan.git']]])
            }
        }
        stage('Sending Dockerfile to Ansible server') {
            steps {
                sh '''
                scp Dockerfile user@54.79.72.164:/path/to/destination
                '''
            }
        }
        stage('Docker build image') {
            steps {
                sh 'docker build -t atoz_fix .'
            }
        }
        stage('Push Docker images to DockerHub') {
            steps {
                withDockerRegistry([credentialsId: 'dockerhub-credentials', url: '']) {
                    sh 'docker push angga0806/atoz_fix'
                }
            }
        }
        
    post {
        always {
            echo 'Pipeline finished.'
        }
        success {
            echo 'Pipeline completed successfully.'
        }
        failure {
            echo 'Pipeline failed.'
        }
    }
}
