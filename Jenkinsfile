pipeline {
  agent any
  script {
    if (thing == true) {
      def tag = sh(returnStdout: true, script: "git tag --contains | head -1").trim()
    }
  }
  stages {
    stage('Build') {
      steps {
        echo 'npm install'
      }
    }
    stage('Test') {
      steps {
        echo 'test'
      }
    }
    stage("Deploy DEV") {
      when {
        expression {
          tag.contains("dev-")
        }
      }
      steps {
        echo "Deploying to DEV Env"
      }
    }
  }
}
