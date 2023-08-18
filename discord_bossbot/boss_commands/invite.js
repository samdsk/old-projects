module.exports = {
    name: 'invite',
    description: 'Generate invite link to bot',
    execute(bot, message, args, VARSET) {
        bot.generateInvite("ADMINISTRATOR")
        .then(link => {
          message.channel.send(link);
        })
        .catch(console.error);
    },
};
